<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::paginate(10);

        return $this->successWithPagination("", VideoResource::collection($videos)->response()->getData(true));
    }
}
