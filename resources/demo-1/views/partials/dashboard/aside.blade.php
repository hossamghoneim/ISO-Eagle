<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle me-n2" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->

    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                <div class="menu-item mb-3">
                    <div class="menu-content pt-8 pb-0">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __("Dashboard") }}</span>
                    </div>
                </div>

                @can('view_admins')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.admins*') }}" href="{{ route('dashboard.admins.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-user-shield"></i>
                        </span>
                        <span class="menu-title"> {{ __("admins") }}</span>
                        </a>
                    </div>
                @endcan

                @can('view_services')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.services*') }}" href="{{ route('dashboard.services.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-diamond"></i>
                        </span>
                        <span class="menu-title"> {{ __("services") }}</span>
                        </a>
                    </div>
                @endcan

                @can('view_categories')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.categories*') }}" href="{{ route('dashboard.categories.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-cubes"></i>
                        </span>
                        <span class="menu-title"> {{ __("categories") }}</span>
                        </a>
                    </div>
                @endcan

                @can('view_products')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.products*') }}" href="{{ route('dashboard.products.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-shopping-cart"></i>
                        </span>
                        <span class="menu-title"> {{ __("products") }}</span>
                        </a>
                    </div>
                @endcan

                @can('view_features')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.features*') }}" href="{{ route('dashboard.features.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-line-chart"></i>
                        </span>
                        <span class="menu-title"> {{ __("features") }}</span>
                        </a>
                    </div>
                @endcan

                @can('view_brands')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.brands*') }}" href="{{ route('dashboard.brands.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-check"></i>
                        </span>
                        <span class="menu-title"> {{ __("brands") }}</span>
                        </a>
                    </div>
                @endcan

                @can('view_videos')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.videos*') }}" href="{{ route('dashboard.videos.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-video-camera"></i>
                        </span>
                        <span class="menu-title"> {{ __("videos") }}</span>
                        </a>
                    </div>
                @endcan

                @can('view_contact_requests')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.contact-requests*') }}" href="{{ route('dashboard.contact-requests.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-address-book"></i>
                        </span>
                        <span class="menu-title"> {{ __("contact requests") }}</span>
                        </a>
                    </div>
                @endcan

                @can('view_settings')
                    <div class="menu-item">
                        <a class="menu-link {{ isTabActive('dashboard.settings*') }}" href="{{ route('dashboard.settings.index') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                                <i class="fa fa-gear"></i>
                        </span>
                        <span class="menu-title"> {{ __("settings") }}</span>
                        </a>
                    </div>
                @endcan

            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
</div>
