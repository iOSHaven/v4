<?php

namespace App\Summary;

use Illuminate\Database\Eloquent\Model;

class SummaryInstall extends Model
{
    protected $table = 'summary_install';

    public function trigger()
    {
        return $this->morphTo();
    }
}
