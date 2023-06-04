<?php

namespace App\Traits;

use App\Models\Enums\Stats\Event;
use App\Models\Stats\StatBuffer;
use App\Summary\SummaryDownload;
use App\Summary\SummaryInstall;
use App\Summary\SummaryView;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait StatBuckets
{
    public function stats(): MorphMany {
        return $this->morphMany(StatBuffer::class, 'target');
    }

    public function impressions() {
        return $this->stats()->where('event', Event::VIEW);
    }

    public function downloads() {
        return $this->stats()->where('event', Event::DOWNLOAD);
    }

    public function installs() {
        return $this->stats()->where('event', Event::INSTALL);
    }

    public function impressionStatBuffer() {
        return $this->morphOne(StatBuffer::class, 'target')
            ->where('event', Event::VIEW)
            ->orderBy('created_at', 'desc');
    }

    public function downloadStatBuffer() {
        return $this->morphOne(StatBuffer::class, 'target')
            ->where('event', Event::DOWNLOAD)
            ->orderBy('created_at', 'desc');
    }

    public function installStatBuffer() {
        return $this->morphOne(StatBuffer::class, 'target')
            ->where('event', Event::INSTALL)
            ->orderBy('created_at', 'desc');
    }

    public function getImpressionsAttribute() {
        return $this->impressionStatBuffer?->running_total ?? 0;
    }

    public function getDownloadsAttribute() {
        return $this->downloadStatBuffer?->running_total ?? 0;
    }

    public function getInstallsAttribute() {
        return $this->installStatBuffer?->running_total ?? 0;
    }

    public function getWeeklyImpressionsAttribute() {
        return $this->impressionStatBuffer?->total ?? 0;
    }

    public function getWeeklyDownloadsAttribute() {
        return $this->downloadStatBuffer?->total ?? 0;
    }

    public function getWeeklyInstallsAttribute() {
        return $this->installStatBuffer?->total ?? 0;
    }
}
