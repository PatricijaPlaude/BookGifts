<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function book() {
        return $this->belongsTo('App\book');
    }

    public function user() {
        return $this->belongsTo('App\user');
    }
}
