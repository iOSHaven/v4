<?php

namespace App\Summary;

use Illuminate\Database\Eloquent\Model;

class SummaryUse extends Model
{
    protected $table = 'summary_use';
    
    public function trigger() {
        return $this->morphTo();
    }
}
