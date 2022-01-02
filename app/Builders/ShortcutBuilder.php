<?php

namespace App\Builders;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ShortcutBuilder extends Builder
{
    public function uid($uid)
    {
        return $this->where('itunes_id', $uid);
    }

    public function name($name)
    {
        return $this->where('name', 'like', '%'.$name.'%');
    }

    public function working()
    {
        return $this->where('approval_status', 'approved');
    }

    public function ownedByUser()
    {
        if (auth()->user()->isAdmin) {
            return $this;
        } else {
            return $this->where('user_id', auth()->user()->id);
        }
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
        }

        $query->working('ipas');

        $query = $query
            ->orderBy($r->sort ?? 'impressions', $r->order ?? 'desc')
            ->get();

        return $query;
    }
}
