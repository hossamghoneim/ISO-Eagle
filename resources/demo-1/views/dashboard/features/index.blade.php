@extends('partials.dashboard.master')
@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ __('Features List') }}</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap mb-5">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="{{ __('Search for services') }}">
                </div>
                <!--end::Search-->
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" id="add_btn" data-bs-toggle="modal" data-bs-target="#crud_modal" data-kt-docs-table-toolbar="base">
                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Coming Soon" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                        </svg>
                    </span>
                        <!--end::Svg Icon-->{{ __('add new feature') }}</button>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-docs-table-select="selected_count"></span>{{ __('selected item') }}</div>
                    <button type="button" class="btn btn-danger" data-kt-docs-table-select="delete_selected">{{ __('delete') }}</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Datatable-->
            <table id="kt_datatable" class="table align-middle text-center table-row-dashed fs-6 gy-5">
                <thead>
                <tr class=" text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_datatable .form-check-input" value="1"/>
                        </div>
                    </th>
                    <th>{{ __('Product') }}</th>
                    <th>{{ __('Headline') }}</th>
                    <th>{{ __('Details') }}</th>
                    <th>{{ __('Icon') }}</th>
                    <th>{{ __('date') }}</th>
                    <th class=" min-w-100px">{{ __('actions') }}</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                </tbody>
            </table>
            <!--end::Datatable-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->

    {{-- begin::Add Country Modal --}}
    <form id="crud_form" class="ajax-form" action="{{ route('dashboard.features.store') }}" method="post" data-success-callback="onAjaxSuccess" data-error-callback="onAjaxError">
        @csrf
        <div class="modal fade" tabindex="-1" id="crud_modal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form_title">{{ __('add new feature') }}</h5>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="d-flex flex-column justify-content-center">
                            <label for="image_inp" class="form-label required text-center fs-6 fw-bold mb-3">{{ __('Icon') }}</label>
                            <x-dashboard.upload-image-inp name="icon" :image="null" :directory="null" placeholder="default.svg" type="editable"></x-dashboard.upload-image-inp>
                        </div>
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                            <label for="product_id_inp" class="form-label required fs-6 fw-bold mb-3">{{ __('Product') }}</label>
                            <select class="form-select form-select-solid" data-control="select2" name="product_id" id="product_id_inp" data-placeholder="{{ __("Choose the product") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected></option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}"> {{ $product->name }} </option>
                                @endforeach
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback" id="product_id"></div>
                        </div>
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                            <label for="headline_ar_inp" class="form-label required fs-6 fw-bold mb-3">{{ __('Headline Ar') }}</label>
                            <input type="text" name="headline_ar" class="form-control form-control-lg form-control-solid" id="headline_ar_inp" placeholder="{{ __('Headline Ar') }}">
                            <div class="fv-plugins-message-container invalid-feedback" id="headline_ar"></div>
                        </div>
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                            <label for="headline_en_inp"
                                class="form-label required fs-6 fw-bold mb-3">{{ __('Headline En') }}</label>
                            <input type="text" name="headline_en" class="form-control form-control-lg form-control-solid"
                                id="headline_en_inp" placeholder="{{ __('Headline En') }}">
                            <div class="fv-plugins-message-container invalid-feedback" id="headline_en"></div>
                        </div>
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                            <label class="form-label required fs-6 fw-bold mb-3">{{ __("Details in Arabic") }}</label>
                            <textarea class="form-control required form-control-lg form-control-solid" placeholder="{{ __('Details in Arabic') }}" name="details_ar" id="details_ar_inp" data-kt-autosize="true"></textarea>
                            <div class="fv-plugins-message-container invalid-feedback" id="details_ar"></div>
                        </div>
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                            <label class="form-label required fs-6 fw-bold mb-3">{{ __("Details in English") }}</label>
                            <textarea class="form-control required form-control-lg form-control-solid" placeholder="{{ __('Details in English') }}" name="details_en" id="details_en_inp" data-kt-autosize="true"></textarea>
                            <div class="fv-plugins-message-container invalid-feedback" id="details_en"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">
                                {{ __('Save') }}
                            </span>
                            <span class="indicator-progress">
                                {{ __('Please wait ...') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- end::Add Country Modal --}}
    <div class="row attachments">
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('js/dashboard/global/datatable-config.js') }}"></script>
    <script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/dashboard/datatables/features.js') }}"></script>
    <script src="{{ asset('js/dashboard/crud-operations.js') }}"></script>
    <script src="{{ asset('dashboard-assets/demo-1/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#add_btn").click(function (e) {
                e.preventDefault();

                $("#form_title").text(__('add new feature'));
                $("[name='_method']").remove();
                $("#crud_form").trigger('reset');
                $(`[name='product_id']`).val('').attr('selected',true);
                $(`[name='product_id']`).trigger('change');
                $("#crud_form").attr('action', `/dashboard/features`);
                $('.image-input-wrapper').css('background-image', `url('/placeholder_images/default.svg')`);
            });


        });
    </script>
@endpush
