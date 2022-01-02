<?php

namespace App\Http\Controllers;

use App\Models\Shortcut;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ShortcutController extends Controller
{
    private function paginate($collection, $limit = null)
    {
        $request = request();
        $limit = $limit ?? $request->limit ?? 15;

        $page = LengthAwarePaginator::resolveCurrentPage();
        $results = $collection->slice(($page - 1) * $limit, $limit)->all();

        return new LengthAwarePaginator($results, count($collection), $limit);
    }

    private function gathered_query($collection, $search = null)
    {
        $request = request();
        $collection = $this->paginate($collection);

        return $filteredData = [
            'count' => $collection->count(),
            'search' => $search ?? $request->q,
            'pageTitle' => $request->title ?? null,
            'shortcuts' => $collection,
        ];
    }

    private function display($data)
    {
        $request = request();
        if ($request->json === 'true') {
            return response()->json($data);
        }

        if ($request->html === 'true') {
            return  view('templates.ShortcutTemplate')->with($data);
        }

        return view('shortcuts')->with($data);
    }

    public function page($tag = null)
    {
        $shortcuts = Shortcut::search($tag);

        $shortcuts = $this->gathered_query($shortcuts, $tag);

        return $this->display($shortcuts);
    }

    public function showDetail($uid)
    {
        $shortcut = Shortcut::uid($uid)->firstOrFail();

        event(new \App\Events\ViewEvent($shortcut));

        return view('shortcutDetail')->with(['shortcut' => $shortcut]);
    }

    public function showPermDetail($id)
    {
        $shortcut = Shortcut::findOrFail($id);

        event(new \App\Events\ViewEvent($shortcut));

        return view('shortcutDetail')->with(['shortcut' => $shortcut]);
    }

    public function install($uid)
    {
        $shortcut = Shortcut::uid($uid)
          ->firstOrFail();

        event(new \App\Events\ViewEvent($shortcut));
        event(new \App\Events\InstallEvent($shortcut));

        return redirect($shortcut->url);
    }
}
