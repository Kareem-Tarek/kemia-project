@extends('layouts.admin.master')

@section('title')
    {{ __('category.category') }}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('category.category') }}</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('category.category') }}</a></li>
        <li class="breadcrumb-item active"> 
            @if($category->parent_id == null)
                {{ $category->name }} (ID: {{ $category->id }})
            @else
                {{ $category->name }} (ID: {{ $category->id }}) <span class="text-danger">&RightArrow;</span> {{ $category->subCategory->name }} (ID: {{ $category->parent_id }})
            @endif
        </li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('category.category') }}</h5>
                        @if($category->parent_id != null)
                            <p class="mb-0 mt-3"><span class="text-decoration-underline font-warning">{{ __('category.note') }}</span> {{ __('category.category_and_subcategory_note') }}</p>
                        @endif
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'ar') active  @endif" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">{{__('master.arabic')}}<div class="media"></div></a></li>
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'en') active  @endif" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'en') true @else false @endif">{{__('master.english')}}</a></li>
                        </ul>
                        
                        <form class="needs-validation" novalidate="" method="post"
                            action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade mt-4 @if(LaravelLocalization::getCurrentLocale() == 'en') show active @endif" id="en" role="tabpanel" aria-labelledby="en-tab">
                                    <div class="row g-1">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="validationCustom01">{{ __('category.name') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" id="validationCustom01" type="text" required=""
                                                name="name_en" placeholder="ex: ELECTRONICS" value="{{Request::old('name_en') ? Request::old('name_en') : $category->getTranslation('name','en') }}" autocomplete="off"/>
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
                                                name="name_ar" placeholder="مثل: إلكترونيات" value="{{Request::old('name_ar') ? Request::old('name_ar') : $category->getTranslation('name','ar')}}" autocomplete="off"/>
                                            <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                            <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-1 @if($category->parent_id == null) d-none @endif">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">{{ __('category.sub_category_of') }} <span class="text-danger">*</span></label>
                                        <select name="parent_id" class="form-control" value="{{Request::old('parent_id') ? Request::old('parent_id') : $category->parent_id}}" required>
                                            <option value="" selected>No sub-category selected.</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected'  : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">حفظ</button>
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
