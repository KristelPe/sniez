<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAllergy extends Model
{
    protected $fillable = [
        'user_id',
        'allergy_id'
    ];

    public function allergies()
    {
        return $this->belongsTo('App\Allergy');
    }
}
