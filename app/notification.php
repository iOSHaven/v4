<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    public function app () {
        return $this->hasOne(App::class);
    }
}
