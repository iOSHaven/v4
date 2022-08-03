<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    public function trigger()
    {
        return $this->morphTo();
    }
}
