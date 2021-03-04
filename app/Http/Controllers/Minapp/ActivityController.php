<?php

namespace App\Http\Controllers\Minapp;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function activity(Request $request)
    {
        try {
            $data= Activity::where('is_recommend');
            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->failed($th->getMessage());
        }
    }
}
