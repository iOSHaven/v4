<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class AppBuilder extends Builder 
{
    public function hasName()
    {
        $this->where('name', '!=', 'No name');
        return $this;
    }

    public function name($name)
    {
        $this->where('name', 'like', "%". $name ."%");
        return $this;
    }

    public function tags($tag)
    {
        $this->where('tags', 'like', "%". $tag ."%");
        return $this;
    }
    
    public function by($snippet) {
        $this->where("signed", 'like', "%" . $snippet . "%");
        return $this;
    }

    public function games()
    {
        return $this->tags("game");
    }

}