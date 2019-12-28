<?php

namespace App\Builders;

use App\Provider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AppBuilder extends Builder 
{
    public function hasName()
    {
        return $this->where('name', '!=', 'No name');
    }

    public function name($name)
    {
        return $this->where('name', 'like', "%". $name ."%");
    }

    public function tag($tag)
    {
        return $this->where('tags', 'like', "%". $tag ."%");
    }
    
    public function by(Provider $provider) {
        return $this->whereHas("itms.providers", function($q) use ($provider) {
            $q->where('providers.id', $provider->id);
        });
    }

    public function working($model) {
        return $this->whereHas($model, function($q) use ($model) {
            $q->where("$model.working", true);
        });
    }

    public function type($model) {
        return $this->whereHas($model);
    }

    public function games()
    {
        return $this->tag("game");
    }

    public function ownedByUser(){
        if (auth()->user()->isAdmin){
            return $this;
        } else {
            return $this->where('user_id', auth()->user()->id);
        }
    }

    public function base_query() {
        return $this->with(['itms.providers', 'ipas.providers'])
                    ->withStats()
                    ->hasName();
    }

    public function withStats() {
        return $this->withCount([
            'impressions as impressions',
            'installs as installs',
            'downloads as downloads'
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
          foreach(explode(",", $args["tags"]) as $tag) {
            $query = $query->tag($tag);
          }
        }
          
        if ($r->working == 'true') {
            if ($args["type"] == "ipa") {
                $query = $query->working('ipas');
            } else if ($args["type"] == "signed" || $args["type"] == "install") {
                $query = $query->working('itms');
            } 
        } else {
            if ($args["type"] == "ipa") {
                $query = $query->type('ipas');
            } else if ($args["type"] == "signed" || $args["type"] == "install") {
                $query = $query->type('itms');
            } 
        }
        
  
        if ($args["by"]) {
          $query = $query->by(Provider::name($args["by"])->firstOrFail());
        }
  
        if ($args["search"] && empty($args["tags"])) {
          $query = $query->orWhere(function(Builder $query) use($args) {
            $query->tag(strtolower($args["search"]));
          });
        }

  
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