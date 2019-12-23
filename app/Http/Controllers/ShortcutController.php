<?php

namespace App\Http\Controllers;

use App\Shortcut;
use Illuminate\Http\Request;

class ShortcutController extends Controller
{
    private function gathered_query(Request $request, $query, $search = null) {
        return $filteredData = [
          'count' => $query->count(),
          'search' => $search ?? $request->q,
          'pageTitle' => $request->title ?? null,
          'shortcuts' => $query,
        ];
      }
  
      private function display(Request $request, $data) {
        if ($request->json == 'true') {
          return response()->json($data);
        }else if ($request->html == 'true') {
          return  view('templates.ShortcutTemplate')->with($data);
        } else {
          return view('shortcuts')->with($data);
        }
      }
      
  
      public function page ($tag = null, Request $request)
      {
        $shortcuts = Shortcut::base_query()
                    ->search($request, $tag);
  
        $shortcuts = $this->gathered_query($request, $shortcuts, $tag);
        return $this->display($request, $shortcuts);
      }
    
      public function showDetail ($uid)
      {
        $shortcut = Shortcut::base_query()
          ->uid($uid)
          ->firstOrFail();

        event(new \App\Events\ViewEvent($shortcut));

        return view('shortcut')->with(['shortcut' => $shortcut]);
      }

      public function install($uid) {
        $shortcut = Shortcut::base_query()
          ->uid($uid)
          ->firstOrFail();
        
        event(new \App\Events\ViewEvent($shortcut));
        event(new \App\Events\InstallEvent($shortcut));
        return redirect($shortcut->url);
      }
}
