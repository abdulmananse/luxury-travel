<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyAgent extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'company_id',
    ];

}
