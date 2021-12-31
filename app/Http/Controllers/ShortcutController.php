<?php

namespace App\Http\Controllers;

use App\Shortcut;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ShortcutController extends Controller
{
    private function paginate(Request $request, $collection, $limit = null)
    {
        $limit = $limit ?? $request->limit ?? 15;

        $page = LengthAwarePaginator::resolveCurrentPage();
        $results = $collection->slice(($page - 1) * $limit, $limit)->all();

        return new LengthAwarePaginator($results, count($collection), $limit);
    }

    private function gathered_query(Request $request, $collection, $search = null)
    {
        $collection = $this->paginate($request, $collection);

        return $filteredData = [
            'count' => $collection->count(),
            'search' => $search ?? $request->q,
            'pageTitle' => $request->title ?? null,
            'shortcuts' => $collection,
        ];
    }

    private function display(Request $request, $data)
    {
        if ($request->json == 'true') {
            return response()->json($data);
        } elseif ($request->html == 'true') {
            return  view('templates.ShortcutTemplate')->with($data);
        } else {
            return view('shortcuts')->with($data);
        }
    }

    public function page($tag, Request $request)
    {
        $shortcuts = Shortcut::search($request, $tag);

        $shortcuts = $this->gathered_query($request, $shortcuts, $tag);

        return $this->display($request, $shortcuts);
    }

    public function showDetail($uid)
    {
        $shortcut = Shortcut::uid($uid)->firstOrFail();

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
