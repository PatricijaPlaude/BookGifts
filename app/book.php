<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    public function order() {
        return $this->hasOne('App\order');
    }

    public function genre() {
        return $this->belongsTo('App\genre');
    }

    public function user() {
        return $this->belongsTo('App\user');
    }
}
