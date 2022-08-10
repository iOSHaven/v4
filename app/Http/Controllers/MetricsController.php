<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetricRequest;

class MetricsController extends Controller
{
    public function handle(MetricRequest $request)
    {
        $metric = app()->make($request->metric);

        return response()->json($metric->render($request));
    }
}
