<?php

namespace App\Http\Controllers\Dashboard;

use App\Rules\NotUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $this->authorize('view_settings');

        $image1 = getImagePathFromDirectory(settings()->get('image1'), 'Settings', "default.svg");
        $image2 = getImagePathFromDirectory(settings()->get('image2'), 'Settings', "default.svg");
        $image3 = getImagePathFromDirectory(settings()->get('image3'), 'Settings', "default.svg");
        $image4 = getImagePathFromDirectory(settings()->get('image4'), 'Settings', "default.svg");

        return view('dashboard.settings', compact('image1', 'image2', 'image3', 'image4'));
    }

    public function store( Request $request )
    {
        $this->authorize('update_settings');

        $data = $request->validate([
            'website_name_ar'                                  => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'website_name_en'                                  => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'facebook_url'                                     => [ 'required_if:setting_type,general' ,'url' ,'nullable' , 'string' , 'max:255'  ],
            'youtube_url'                                      => [ 'required_if:setting_type,general' ,'url' ,'nullable' , 'string' , 'max:255'  ],
            'linkedin_url'                                     => [ 'required_if:setting_type,general' ,'url' ,'nullable' , 'string' , 'max:255'  ],
            'email'                                            => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'phone'                                            => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'whatsapp'                                         => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'address'                                          => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'location'                                         => [ 'required_if:setting_type,general' ,'nullable' , 'string' ],
            'opening_hours'                                    => [ 'required_if:setting_type,general' ,'nullable' , 'string' ],
            'home_footer_brief'                                => [ 'required_if:setting_type,general' ,'nullable' , 'string' ],
            'what_we_do'                                       => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'our_vision'                                       => [ 'required_if:setting_type,general' ,'string' ,'nullable' , 'string' , 'max:500'  ],
            'our_sectors'                                      => [ 'required_if:setting_type,general' ,'string' ,'nullable' , 'string' , 'max:500'  ],
            'meta_tag_description_ar'                          => [ 'required_if:setting_type,seo'     ,'nullable' , 'string' , 'max:255'  ],
            'meta_tag_description_en'                          => [ 'required_if:setting_type,seo'     ,'nullable' , 'string' , 'max:255'  ],
            'meta_tag_keyword_ar'                              => [ 'required_if:setting_type,seo'     ,'nullable' , 'string' , 'max:255'  ],
            'meta_tag_keyword_en'                              => [ 'required_if:setting_type,seo'     ,'nullable' , 'string' , 'max:255'  ],
            'privacy_policy_ar'                                => [ 'required_if:setting_type,website' ,'nullable' , 'string' ],
            'privacy_policy_en'                                => [ 'required_if:setting_type,website' ,'nullable' , 'string' ],
            'terms_and_conditions_en'                          => [ 'required_if:setting_type,website' ,'nullable' , 'string' ],
            'terms_and_conditions_ar'                          => [ 'required_if:setting_type,website' ,'nullable' , 'string' ],
            'about_us_ar'                                      => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'about_us_en'                                      => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'footer_text_ar'                                   => [ 'required_if:setting_type,about-website' ,'nullable' , 'string', 'max:255' ],
            'footer_text_en'                                   => [ 'required_if:setting_type,about-website' ,'nullable' , 'string', 'max:255' ],
            'title_ar'                                         => [ 'required_if:setting_type,slider' ,'nullable' , 'string', 'max:255' ],
            'title_en'                                         => [ 'required_if:setting_type,slider' ,'nullable' , 'string', 'max:255' ],
            'description_ar'                                   => [ 'required_if:setting_type,slider' ,'nullable' , 'string', 'max:255' ],
            'description_en'                                   => [ 'required_if:setting_type,slider' ,'nullable' , 'string', 'max:255' ],
        ]);


        $this->validateFiles('about_us_home_background','general',$request,$data);
        $this->validateFiles('about_us_page_background','general',$request,$data);
        $this->validateFiles('what_we_do_photo','general',$request,$data);
        $this->validateFiles('image1','slider',$request,$data);
        $this->validateFiles('image2','slider',$request,$data);
        $this->validateFiles('image3','slider',$request,$data);
        $this->validateFiles('image4','slider',$request,$data);

        foreach ( $data as $key => $value )
        {
            settings()->set( $key , $value);
        }

    }

    private function validateFiles($keyName , $sectionName , Request $request , &$data)
    {
        if(! settings()->get($keyName))
        {
            $request->validate([
                $keyName   => [ 'bail' , "required_if:setting_type,$sectionName", 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048',  'nullable' ],
            ]);
        }


        if($request->hasFile($keyName))
        {
            $request->validate([
                $keyName   => [ 'bail' ,'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:2048' ]
            ]);
            $data[$keyName] = uploadImage( $request->file($keyName) , "Settings");
        }

    }

    public function changeThemeMode(Request $request)
    {
        session()->put('theme_mode', $request->mode);
        return redirect()->back();
    }

    public function changeLanguage(Request $request)
    {
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
