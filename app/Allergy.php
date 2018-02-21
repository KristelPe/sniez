<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $fillable = [
        'name',
        'path'
    ];

    public function userAllergy()
    {
        return $this->hasMany('App\UserAllergies');
    }
}
