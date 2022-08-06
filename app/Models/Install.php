<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Install extends Model
{
    public function trigger()
    {
        return $this->morphTo();
    }
}
