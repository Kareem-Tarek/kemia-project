@extends('layouts.admin.master')

@section('title')
    {{ __('category.add_category') }}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3></h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('category.category') }}</a></li>
        <li class="breadcrumb-item active">{{ __('category.add_category') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('category.category') }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'ar') active  @endif" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">{{__('master.arabic')}}<div class="media"></div></a></li>
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'en') active  @endif" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">{{__('master.english')}}</a></li>
                        </ul>
                        
                        <form class="needs-validation" novalidate="" method="post" action="{{ route('categories.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="tab-pane fade mt-4 @if(LaravelLocalization::getCurrentLocale() == 'en') show active @endif" id="en" role="tabpanel" aria-labelledby="en-tab">
                                <div class="row g-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationCustom01">{{ __('category.name') }} <span class="text-danger">*</span></label>
                                        <input class="form-control" id="validationCustom01" type="text" required=""
                                            name="name_en" placeholder="ex: ELECTRONICS" value="{{ old('name_en') }}" />
                                        <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                        <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-4 @if(LaravelLocalization::getCurrentLocale() == 'ar') show active @endif" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                <div class="row g-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationCustom01">{{ __('category.name') }} <span class="text-danger">*</span></label>
                                        <input class="form-control" id="validationCustom01" type="text" required=""
                                            name="name_ar" placeholder="مثل: الكترونيات" value="{{ old('name_ar') }}" />
                                        <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                        <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">{{ __('category.sub_category_of') }}</label>
                                        <select name="parent_id" class="form-control" value="{{ old('parent_id') }}">
                                            <option value="" selected>No sub-category selected.</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            {{-- <div class="row g-2">

                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom03">{{ __('master.mobile') }}</label>
                                    <input class="form-control" id="validationCustom03" type="text" name="mobile"
                                        placeholder="رقم الهاتف" required="" value="{{ old('mobile') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom04">{{ __('master.email') }}</label>
                                    <input class="form-control" id="validationCustom04" type="email" name="email"
                                        placeholder="ex: mohamedsamy@mail.com" required=""
                                        value="{{ old('email') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                            </div> --}}

                            <button class="btn btn-primary" type="submit">{{ __('master.save') }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    @endpush
@endsection
