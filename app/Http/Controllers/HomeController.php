<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\ReactJS;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function toggleEditing(Request $request)
    {
        $user = User::find(Auth::id());
        $user->isEditing = ! $user->isEditing;
        $user->save();

        return response()->json($user);
    }

    public function getPlist()
    {
        if (! Auth::user()->isAdmin) {
            return abort(404);
        } else {
            return view('plistGenerator');
        }
    }

    public function color(Request $request)
    {
        Session::put('color', $request->color);

        return back();
    }

    public function postPlist(Request $r)
    {
        $name = $r->name;
        $url = (substr($r->url, 0, 4) == 'itms') ? explode('url=', $r->url)[1] : $r->url;
        $decoded = urldecode($url);
        $plist = file_get_contents($decoded);
        $dom = new \DOMDocument();
        $xml = file_get_contents($decoded);
        $plist = simplexml_load_string($xml);
        if (! $plist->dict->array->dict->array->dict[1]) {
            $plist->dict->array->dict->array->addChild('dict');
            $plist->dict->array->dict->array->dict[1]->addChild('key', 'kind');
            $plist->dict->array->dict->array->dict[1]->addChild('string', 'display-image');
            $plist->dict->array->dict->array->dict[1]->addChild('key', 'needs-shine');
            $plist->dict->array->dict->array->dict[1]->addChild('true');
            $plist->dict->array->dict->array->dict[1]->addChild('key', 'url');
            $plist->dict->array->dict->array->dict[1]->addChild('string', asset('logo.svg'));
        } else {
            $plist->dict->array->dict->array->dict[1]->string[1] = asset('logo.svg');
        }
        $plist->dict->array->dict->dict->string[3] = "**$name**\n🙏 iOS Haven 🙏";
        $plist->asXml(public_path("signed/$name.plist"));
        $result = 'itms-services://?action=download-manifest&url='.asset("signed/$name.plist");
        $r->session()->flash('plist', $result);

        return back();
    }
}
