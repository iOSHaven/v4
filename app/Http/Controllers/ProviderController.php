<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('CreateProvider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        $providers = Provider::get();

        return view('EditProviders')->with('providers', $providers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        $count = $r->dynamic_input_count;
        for ($i = 1; $i <= $count; $i++) {
            $name = $r->{'name-'.$i};
            if (! empty($name)) {
                $p = Provider::firstOrNew(['id' => $i]);
                $p->name = $name;
                $p->twitter = $r->{'twitter-'.$i};
                $p->revoked = ! empty($r->{'revoked-'.$i});
                $p->save();
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return back();
    }
}
