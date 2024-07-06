<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\VideoResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Service;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $lang = request()->header('Content-Language') ?? 'ar';
        $brands = Brand::limit(5)->get();
        $services = Service::limit(3)->get();
        $videos = Video::limit(6)->get();
        $categories = Category::limit(9)->get();

        return $this->success('', [
            'brands' => BrandResource::collection($brands),
            'about_us' => [
                'description' => $lang == 'ar' ? settings()->get('about_us_ar') : settings()->get('about_us_en'),
                'background' => asset(getImagePathFromDirectory(settings()->get('about_us_home_background'), 'Settings', "default.svg"))
            ],
            'what_we_do' => [
                'description' => settings()->get('what_we_do'),
                'photo' => asset(getImagePathFromDirectory(settings()->get('what_we_do_photo'), 'Settings', "default.svg")),
            ],
            'services' => ServiceResource::collection($services),
            'videos' => VideoResource::collection($videos),
            'categories' => CategoryResource::collection($categories)
        ]);
    }

    public function general()
    {
        $lang = request()->header('Content-Language') ?? 'ar';
        return $this->success('', [
            'about_us_text' => $lang == 'ar' ? settings()->get('about_us_ar') : settings()->get('about_us_en'),
            'about_us_home_background' => asset(getImagePathFromDirectory(settings()->get('about_us_home_background'), 'Settings', "default.svg")),
            'about_us_page_background' => asset(getImagePathFromDirectory(settings()->get('about_us_page_background'), 'Settings', "default.svg")),
            'what_we_do' => settings()->get('what_we_do'),
            'what_we_do_photo' => asset(getImagePathFromDirectory(settings()->get('what_we_do_photo'), 'Settings', "default.svg")),
            'facebook_url' => settings()->get('facebook_url'),
            'linkedin_url' => settings()->get('linkedin_url'),
            'youtube_url' => settings()->get('youtube_url'),
            'our_vision' => settings()->get('our_vision'),
            'our_sectors' => settings()->get('our_sectors'),
            'privacy_policy_text' => $lang == 'ar' ? settings()->get('privacy_policy_ar') : settings()->get('privacy_policy_en'),
            'terms_and_conditions_text' => $lang == 'ar' ? settings()->get('terms_and_conditions_ar') : settings()->get('terms_and_conditions_en'),
        ]);
    }
}
