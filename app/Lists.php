<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $fillable = [
        'name',
        'img',
        'user_id'
    ];

    public function listables(){
        return $this->hasMany('App\Listable', 'list_id');
    }
}
