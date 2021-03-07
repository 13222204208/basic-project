<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ImgUrl;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadImgController extends Controller
{
    use UploadImage, ImgUrl;

    public function uploadImg(Request $request)
    {
        $imgUrl= $this->getNewFile($request->upload);
        $data['url'] = $imgUrl;
        $data['uploaded']= true;
        return response()->json($data);
    }

    public function uploadContentImg(Request $request)//富文本内的图片上传
    {
        try {
            $imgUrl= $this->getNewFile($request->upload);
            $data['url'] = $this->currentUrl().$imgUrl;
            $data['uploaded']= true;
            return response()->json($data);
        } catch (\Throwable $th) {
            return $this->failed($th->getMessage());
        }
    }
}
