<?php

namespace App\Summary;

use Illuminate\Database\Eloquent\Model;

class SummaryView extends Model
{
    protected $table = 'summary_view';
    
    public function trigger() {
        return $this->morphTo();
    }
}
