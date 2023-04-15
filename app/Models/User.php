<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    /**
     * Get the image
     *
     * @return string
     */
    public function getImageAttribute()
    {
        $media = $this->getMedia('avatar')->first();
        unset($this->media);
        if($media) {
            return $media->getUrl();
        }
        return null;
    }

    /**
     * Get the company logo
     *
     * @return string
     */
    public function getCompanyLogoAttribute()
    {
        $media = $this->getMedia('company_logo')->first();
        unset($this->media);
        if($media) {
            return $media->getUrl();
        }
        return null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'company_id',
        'company_name',
        'company_phone',
        'company_email',
        'company_website',
        'commission',
        'invited',
        'password',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'first_name',
        'last_name',
    ];

    /**
     * Get first name
     */
    public function getfirstNameAttribute()
    {
        $name = explode(' ', $this->name);
        return isset($name[0]) ? $name[0] : '';
    }

    /**
     * Get last name
     */
    public function getlastNameAttribute()
    {
        $name = explode(' ', $this->name);
        return isset($name[1]) ? $name[1] : '';
    }
}
