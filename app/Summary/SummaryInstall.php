<?php

namespace App\Summary;

use Illuminate\Database\Eloquent\Model;

class SummaryInstall extends Model
{
    protected $table = 'summary_install';

    protected $fillable = [
        'trigger_id', 'trigger_type', 'amount', 'created_at',
    ];

    public function trigger()
    {
        return $this->morphTo();
    }
}
