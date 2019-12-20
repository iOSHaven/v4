<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Install extends Model
{
    public function trigger() {
        return $this->morphTo();
    }
}
