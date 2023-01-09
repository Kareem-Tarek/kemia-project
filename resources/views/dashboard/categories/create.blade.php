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
                        @if($categories)
                            <p class="mb-0 mt-3"><span class="text-decoration-underline font-warning">{{ __('category.note') }}</span> {{ __('category.category_and_subcategory_note') }}</p>
                        @endif
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'ar') active  @endif" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">{{__('master.arabic')}}<div class="media"></div></a></li>
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'en') active  @endif" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'en') true @else false @endif">{{__('master.english')}}</a></li>
                        </ul>
                        
                            <form class="needs-validation" novalidate="" id="alert-form" method="post" action="{{ route('categories.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="tab-content" id="pills-tabContent">
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
                                                    name="name_ar" placeholder="مثل: إلكترونيات" value="{{ old('name_ar') }}" />
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationCustom01">{{ __('category.status') }} <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="validationCustom01" value="{{ old('status') }}" required="">
                                            <option value="" selected>Please select a status.</option>
                                            <option value="avaialbe">{{ __('category.available') }}</option>
                                            <option value="unavaialbe">{{ __('category.unavailable') }}</option>
                                        </select>
                                        <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                        <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                    </div>
                                </div>

                                <div class="row g-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">{{ __('category.sub_category_of') }}</label>
                                            <select name="parent_id" class="form-control" value="{{ old('parent_id') }}">
                                                <option value="" selected>No sub-category selected.</option>
                                                @forelse($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @empty
                                                @endforelse
                                            </select>
                                        <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                        <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                    </div>
                                </div>

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
