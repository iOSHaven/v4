<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    public function trigger() {
        return $this->morphTo();
    }
}
