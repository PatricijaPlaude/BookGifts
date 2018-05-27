<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    public function book() {
        return $this->hasMany('App\book');
    }
}
