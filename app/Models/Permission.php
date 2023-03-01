<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name'
    ];

   
    /**
     * boot
     */
    protected static function boot ()
    {
    	parent::boot();

        static::creating(function ($model) {
            $model->guard_name = 'web';
        });
        
    }
}
