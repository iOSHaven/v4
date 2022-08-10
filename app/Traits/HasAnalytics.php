<?php

namespace App\Traits;

use App\Summary\SummaryDownload;
use App\Summary\SummaryInstall;
use App\Summary\SummaryView;

trait HasAnalytics
{
    public function SummarizedViews()
    {
        return $this->morphMany(SummaryView::class, 'trigger');
    }

    public function SummarizedDownloads()
    {
        return $this->morphMany(SummaryDownload::class, 'trigger');
    }

    public function SummarizedInstalls()
    {
        return $this->morphMany(SummaryInstall::class, 'trigger');
    }
}
