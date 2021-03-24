<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function result(Request $request){
        Log::info($request->all());
        return $this->success();
    }
}
