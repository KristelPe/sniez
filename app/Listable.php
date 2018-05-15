<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listable extends Model
{
    protected $fillable = [
        'list_id',
        'listable_id',
    ];

    public function parent(){
        return $this->belongsTo('App\Lists', 'list_id');
    }
}
