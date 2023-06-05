<?php

namespace App\Summary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryView extends Model
{
    use HasFactory;

    protected $table = 'summary_view';

    protected $fillable = ['created_at', 'trigger_type', 'trigger_id', 'amount'];

    public function trigger()
    {
        return $this->morphTo('trigger');
    }
}
