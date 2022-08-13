<?php

namespace App\Summary;

use Illuminate\Database\Eloquent\Model;

class SummaryUse extends Model
{
    protected $table = 'summary_use';

    protected $fillable = [
        "trigger_id", "trigger_type", "amount", "created_at"
    ];

    public function trigger()
    {
        return $this->morphTo();
    }
}
