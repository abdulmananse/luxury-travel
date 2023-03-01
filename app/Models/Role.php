<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name',
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
