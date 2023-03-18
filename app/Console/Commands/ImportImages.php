<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Log as ModelsLog;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;

use ZipArchive;
use File;

class ImportImages extends Command
{
    public $readProperty;
    public $_skipProperties;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import images from google drive';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('max_execution_time', 0);
        ModelsLog::where('type', 'GoogleDriveImages')->delete();


        try {
            $this->importGoogleDriveImages();
        } catch (\Exception $e) {
            $error = $this->parseException($e);
            $message = "Unable to download images. {ErrorMessage} $error";
            $destinationName = '';
            $pisLink = '';
            $this->createDbErrorLog($destinationName, $pisLink, $message, 'GoogleDriveImages', 'error', 'Tech Team');

            sleep(5);
            $this->_skipProperties[] = $this->readProperty->property_id;
            $this->importGoogleDriveImages($this->_skipProperties);
        }
        return 0;
    }

    private function importGoogleDriveImages($skipProperties = []){
        $disk = Storage::disk('google');
        $properties = Property::select('id', 'property_id', 'images_folder_link')->get();
        $propertiesDownloaded = 0;
        foreach($properties as $property) {

            $zipFileName = $property->property_id . '.zip';
            if (!in_array($property->property_id, $skipProperties) && !file_exists(storage_path("app/public/{$zipFileName}"))) {
                $propertiesDownloaded += 1;
                $this->readProperty = $property;
                $imageLink = explode('folders/', $property->images_folder_link);
                if (isset($imageLink[1])) {
                    $dir = str_replace('?usp=sharing', '', $imageLink[1]);
                    $contents = collect($disk->listContents($dir, false));
                    $files = $contents->where('type', '=', 'file')->sortBy('filename')->take(20);
                    //dd($files->toArray());

                    $property->clearMediaCollection('images');

                    $folder = storage_path("app/public/{$property->property_id}");
                    $this->deleteDirectory($folder);
                    mkdir($folder, 0777, true);

                    $i=1;
                    foreach($files as $file) {
                        //dd($file);
                        $readStream = $disk->getDriver()->readStream($file['path']);
                        $fileData = stream_get_contents($readStream);
                        $filename = $file['filename'].'.'.$file['extension'];

                        $targetFile = "{$folder}/{$filename}";
                        file_put_contents($targetFile, $fileData, FILE_APPEND);

                        if ($i<=4) {
                            $tempFolder = storage_path("app/public/temp");
                            if (!file_exists($tempFolder)) {
                                mkdir($tempFolder, 0777, true);
                            }

                            $tempTargetFile = "{$tempFolder}/{$filename}";
                            file_put_contents($tempTargetFile, $fileData, FILE_APPEND);
                            $property->addMedia($tempTargetFile)->toMediaCollection('images');
                        }

                        $i++;
                        //exit;
                    }


                    $zip = new ZipArchive;

                    if ($zip->open(storage_path("app/public/{$zipFileName}"), ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE)
                    {
                        $files = File::files($folder);

                        foreach ($files as $key => $value) {
                            $relativeNameInZipFile = basename($value);
                            $zip->addFile($value, $relativeNameInZipFile);
                        }

                        $zip->close();

                        $this->deleteDirectory($folder);
                    }
                }
            }
        }
    }

    private function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }

        return rmdir($dir);
    }

    private function parseException($e)
    {
        return json_encode(json_decode(json_encode($e->getMessage()), true));
    }

    public function createDbErrorLog($destinationName = '', $pisLink = '', $message = '', $type = 'property', $errorType = 'error', $errorCategory = 'Data Team')
    {
        ModelsLog::create([
            'message' => $message,
            'destination_name' => $destinationName,
            'pis_link' => $pisLink,
            'type' => $type,
            'error_type' => $errorType,
            'error_category' => $errorCategory
        ]);
    }
}
