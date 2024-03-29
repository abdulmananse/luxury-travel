<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Property extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 500, 300)
            ->nonQueued();
    }

    /**
     * Get the image
     *
     * @return string
     */
    public function getImageAttribute()
    {
        $media = $this->getMedia('images')->first();
        unset($this->media);
        if($media) {
            return $media->getUrl();
        }
        return null;
    }

    /**
     * Get the images
     *
     * @return string
     */
    // public function getImagesAttribute()
    // {
    //     $media = $this->getMedia('images');
    //     unset($this->media);
    //     $images = [];
    //     if($media) {
    //         foreach($media as $image){
    //             $images[] = $image->getUrl();
    //         }
    //     }
    //     return $images;
    // }

    /**
     * Get the images
     *
     * @return string
     */
    public function getThumbsAttribute()
    {
        $media = $this->getMedia('images');
        unset($this->media);
        $images = [];
        if($media) {
            foreach($media as $image){
                $images[] = $image->preview_url;
            }
        }
        return $images;
    }

    public function getThumbAttribute()
    {
        $media = $this->getMedia('images')->first();
        unset($this->media);
        if($media) {
            return $media->preview_url;
        }
        return null;
    }

    public function getShortDescriptionAttribute()
    {
        return Str::words($this->description, 50, '...');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'clickup_id',
        'sheet_id',
        'company_id',
        'property_id',
        'currency',
        'currency_symbol',
        'community',
        'commission',
        'municipal_fee',
        'occupancy_fee',
        'gratuity_fee',
        'security_deposit',
        'vat_rate',
        'name',
        'account',
        'pis',
        'pis_sheet_id',
        'google_calendar_link',
        'google_calendar_id',
        'ical_link',
        'images_folder_link',
        'youtube_embed_link',
        'property_rating',
        'property_type',
        'design_type',
        'property_manager',
        'max_guests',
        'no_of_beds',
        'no_of_bathrooms',
        'no_of_bedrooms',
        'other_room_details',
        'description',
        'property_size',
        'hotel_complex',
        'gated_community',
        'eco_friendly',
        'view_types',
        'placement_types',
        'curator',
        'parties_events',
        'smoking',
        'pets',
        'adults',
        'good_to_know',
        'coordinates',
        'street',
        'zip_code',
        'destination',
        'city',
        'country',
        'location_description',
        'airport',
        'calendar_fallback',
        'comments',
        'slide_link',
        'pdf_link',
        'price_doc_link',
        'price_pdf_link',
        'property_pdf_notes'
    ];

    /**
     * belongsTo
     */
    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }

    /**
     * hasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id', 'property_id');
    }
}
