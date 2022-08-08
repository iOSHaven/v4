<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetricRequest;
use Illuminate\Http\Request;

class MetricsController extends Controller
{
    public function handle(MetricRequest $request) {

        $metric = app()->make($request->metric);

        return response()->json($metric->render($request));

    }
}
