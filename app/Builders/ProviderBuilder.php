<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class ProviderBuilder extends Builder
{
    public function name($name)
    {
        return $this->where('name', 'like', '%'.$name.'%');
    }
}
