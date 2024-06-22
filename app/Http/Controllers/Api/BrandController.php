<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        
        return $this->successWithPagination("", BrandResource::collection($brands)->response()->getData(true));
    }
}
