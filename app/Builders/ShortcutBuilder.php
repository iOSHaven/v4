<?php

namespace App\Builders;

use App\Provider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ShortcutBuilder extends Builder 
{
    // public function hasName()
    // {
    //     return $this->where('name', '!=', 'No name');
    // }

    public function uid($uid) {
      return $this->where('itunes_id', $uid);
    }

    public function name($name)
    {
        return $this->where('name', 'like', "%". $name ."%");
    }

    // public function tag($tag)
    // {
    //     return $this->where('tags', 'like', "%". $tag ."%");
    // }
    
    // public function by(Provider $provider) {
    //     return $this->whereHas("itms.providers", function($q) use ($provider) {
    //         $q->where('providers.id', $provider->id);
    //     });
    // }

    public function working() {
        return $this->where('approval_status', 'approved');
    }

    // public function type($model) {
    //     return $this->whereHas($model);
    // }

    // public function games()
    // {
    //     return $this->tag("game");
    // }

    public function base_query() {
        return $this->withCount([
            'impressions as impressions',
            'installs as installs'
        ]);
    }

    public function recently_updated() {
        return $this->where('updated_at', '>', now()->subDays(3))->orderBy('updated_at', 'desc');
    }

    public function search(Request $r, $search=null) {
        $args = parseQuery($search ?? $r->q, [
          "type" => $r->type,
          "by" => $r->by,
          "tags" => $r->tags,
        ]);

        $query = $this;
  
        if(empty($args["tags"])) {
          $query = $query->name($args["search"]);
        } else {
        //   foreach(explode(",", $args["tags"]) as $tag) {
        //     $query = $query->tag($tag);
        //   }
        }
        
        $query->working('ipas');
  
        // if ($args["search"] && empty($args["tags"])) {
        //   $query = $query->orWhere(function(Builder $query) use($args) {
        //     $query->tag(strtolower($args["search"]));
        //   });
        // }

  
        if ($r->limit || !$r->json) {
          $query = $query
            ->orderBy($r->sort ?? "impressions", $r->order ?? "desc")
            ->paginate($r->limit);
        } else {
          $query = $query
              ->orderBy($r->sort ?? "impressions", $r->order ?? "desc")
              ->get();
        }
  
        return $query;
      }

}