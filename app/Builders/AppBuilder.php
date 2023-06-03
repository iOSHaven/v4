<?php

namespace App\Builders;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;

class AppBuilder extends Builder
{
    public function hasName()
    {
        return $this->where('name', '!=', 'No name');
    }

    public function name($name)
    {
        return $this->where('name', 'like', '%'.$name.'%');
    }

    public function tag($tag)
    {
        return $this->where('tags', 'like', '%'.$tag.'%');
    }

    public function by(Provider $provider)
    {
        return $this->whereHas('itms.providers', function ($q) use ($provider) {
            $q->where('providers.id', $provider->id);
        });
    }

    public function working($model)
    {
        return $this->whereHas($model, function ($q) use ($model) {
            $q->where("$model.working", true);
        });
    }

    public function type($model)
    {
        return $this->whereHas($model);
    }

    public function games()
    {
        return $this->tag('game');
    }

    public function ownedByUser()
    {
        if (auth()->user()->isAdmin) {
            return $this;
        } else {
            return $this->where('user_id', auth()->user()->id);
        }
    }

    public function base_query()
    {
        return $this->with(['itms.providers', 'ipas.providers'])
                    // ->withStats()
            ->hasName();
    }

    public function recently_updated($days = 3)
    {
        return $this->where('updated_at', '>', now()->subDays($days))->orderBy('updated_at', 'desc');
    }

    public function search($search = null)
    {
        $r = request();
        $args = parseQuery($search ?? $r->q, [
            'type' => $r->type,
            'by' => $r->by,
            'tags' => $r->tags,
        ]);

        $query = $this;

        if (empty($args['tags'])) {
            $query = $query->name($args['search']);
        } else {
            foreach (explode(',', $args['tags']) as $tag) {
                $query = $query->tag($tag);
            }
        }

        if ($r->working === 'true') {
            if ($args['type'] === 'ipa') {
                $query = $query->working('ipas');
            } elseif ($args['type'] === 'signed' || $args['type'] === 'install') {
                $query = $query->working('itms');
            }
        } else {
            if ($args['type'] === 'ipa') {
                $query = $query->type('ipas');
            } elseif ($args['type'] === 'signed' || $args['type'] === 'install') {
                $query = $query->type('itms');
            }
        }

        if ($args['by']) {
            $query = $query->by(Provider::name($args['by'])->firstOrFail());
        }

        if ($args['search'] && empty($args['tags'])) {
            $query = $query->orWhere(function (Builder $query) use ($args) {
                $query->tag(strtolower($args['search']));
            });
        }

        $query = $query
            ->orderBy($r->sort ?? 'impressions', $r->order ?? 'desc')
            ->get();

        return $query;
    }
}
