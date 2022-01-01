<?php

namespace App\Summary;

use Illuminate\Database\Eloquent\Model;

class SummaryDownload extends Model
{
    protected $table = 'summary_download';

    public function trigger()
    {
        return $this->morphTo();
    }
}
