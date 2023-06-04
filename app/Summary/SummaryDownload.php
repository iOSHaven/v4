<?php

namespace App\Summary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryDownload extends Model
{
    use HasFactory;
    
    protected $table = 'summary_download';

    protected $fillable = [
        'trigger_id', 'trigger_type', 'amount', 'created_at',
    ];

    public function trigger()
    {
        return $this->morphTo();
    }
}
