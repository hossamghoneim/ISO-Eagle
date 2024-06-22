<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\VideoResource;
use App\Models\Brand;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::limit(5)->get();
        $services = Service::limit(3)->get();
        $videos = Video::limit(6)->get();

        return $this->success('', [
            'brands' => BrandResource::collection($brands),
            'services' => ServiceResource::collection($services),
            'videos' => VideoResource::collection($videos)
        ]);
    }
}
