@extends('partials.dashboard.master')
@section('content')
<!--begin::Navbar-->
<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <div class="symbol symbol-50px">
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <div class="symbol-label fs-2 fw-semibold text-success">{{ strtoupper(substr($product->name, 0, 2)) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Pic-->
            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="javascript:;" class="text-gray-900 fs-2 fw-bold me-1 cursor-default disabled">{{$product->name}}</a>
                        </div>
                        <!--end::Name-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <i class="fonticon-cash-payment me-2 text-primary fs-3"></i>
                                    <!--end::Svg Icon-->
                                    <div class="fs-2 fw-bold">{{ $product->created_at->format('Y-m-d') }}</div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{ __('date') }}</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->
    </div>
</div>
<!--end::Navbar-->
<div class="row g-6 g-xl-9 mb-5 mb-xl-10">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card h-100">
            <!--begin::Card head-->
            <div class="card-header card-header-stretch">
                <!--begin::Title-->
                <div class="card-title d-flex align-items-center">
                    <h3 class="fw-bold m-0 text-gray-800">{{ __('Product Images') }}</h3>
                </div>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar m-0">
                    <!--begin::Tab nav-->
                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a id="image-tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#image" aria-selected="true">{{ __('Images') }}</a>
                        </li>

                    </ul>
                    <!--end::Tab nav-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card head-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Tab Content-->
                <div class="tab-content">
                    <!--begin::Tab panel-->
                    <div id="image" class="card-body p-0 tab-pane fade active show" role="tabpanel" aria-labelledby="image">
                        <!--begin::Card body-->
                        <div class="card-body p-9 pt-4">


                            <div class="tns" style="direction: ltr">
                                <div data-tns="true" data-tns-nav-position="bottom" data-tns-mouse-drag="true" data-tns-controls="false">
                                    <!--begin::Item-->
                                    @foreach ($product->productImages as $image)
                                        <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{ $image->full_image_path }}" target="_blank">
                                            <!--begin::Image-->
                                            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                                <img src="{{ $image->full_image_path }}" class="card-rounded shadow mw-25" alt="" />
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    @endforeach
                                    ...
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Tab panel-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card h-100">
            <!--begin::Card head-->
            <div class="card-header card-header-stretch">
                <!--begin::Title-->
                <div class="card-title d-flex align-items-center">
                    <h3 class="fw-bold m-0 text-gray-800">{{ __('Product Details') }}</h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Card head-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Tab Content-->
                <div class="tab-content">
                    <!--begin::Tab panel-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                            <i class="fa fa-lightbulb fs-2 me-2"></i>{{ __('Features')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            <div class="d-flex align-items-center justify-content-end">
                                                @foreach($product->features as $feature)
                                                    <!--begin::Name-->
                                                    <span class="badge badge-light-info fs-7 m-1">{{ __( $feature->headline ) }}</span>
                                                    <!--end::Name-->
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                            <i class="fa fa-tags fs-2 me-2"></i>{{ __('Category')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <div class="symbol-label fs-2 fw-semibold text-success">{{ strtoupper(substr($product->category->name,0,2)) }}</div>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Name-->
                                                <span class="text-gray-600 text-hover-primary">{{ $product->category->name }}</span>
                                                <!--end::Name-->
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                            <i class="fa fa-info-circle fs-2 me-2"></i>{{ __('Description') }}</div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            <span class="text-gray-600 text-hover-primary">{{ $product->description }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Tab panel-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('js/dashboard/global/datatable-config.js') }}"></script>
    <script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>
@endpush
