<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Link extends Pivot
{
    public static function boot()
    {
        parent::boot();

        static::saving(function ($item) {
            $item->pivotParent->forceFill([
                'updated_at' => now(),
            ])->save();
        });

        static::deleting(function ($item) {
            $item->pivotParent->forceFill([
                'updated_at' => now(),
            ])->save();
        });
    }
}
