<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImagesLog extends Model
{

    protected $table = 'property_images_logs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_id',
        'download_date',
        'status',
        'response'
    ];

}
