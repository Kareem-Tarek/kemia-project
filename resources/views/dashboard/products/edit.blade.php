@extends('layouts.admin.master')

@section('title')
    {{ __('product.product') }}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('product.product') }}</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('product.product') }}</a></li>
        <li class="breadcrumb-item active"> {{ __('product.product_edit') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('product.product') }}</h5>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'ar') active  @endif" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">{{__('master.arabic')}}<div class="media"></div></a></li>
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'en') active  @endif" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'en') true @else false @endif">{{__('master.english')}}</a></li>
                        </ul>

                        <form class="needs-validation" novalidate="" method="post" action="{{ route('products.edit') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade mt-4 @if(LaravelLocalization::getCurrentLocale() == 'en') show active @endif" id="en" role="tabpanel" aria-labelledby="en-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('product.title') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_en" placeholder="ex: Black shirt" value="{{ Request::old('title_en') ? Request::old('title_en') : $product_edit->getTranslation( 'title', 'en' ) }}" />
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div> 
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('product.description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_en" placeholder="ex: color, size, about product" value="{{ Request::old('description_en') ? Request::old('description_en') : $product_edit->getTranslation( 'description', 'en' ) }}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>
                                </div>

                                <div class="tab-pane fade mt-4 @if(LaravelLocalization::getCurrentLocale() == 'ar') show active @endif" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('product.title') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_ar" placeholder="ex: Black shirt" value="{{ Request::old('title_ar') ? Request::old('title_ar') : $product_edit->getTranslation( 'title', 'ar' ) }}" />
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('product.description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_ar" placeholder="ex: color, size, about product" value="{{ Request::old('description_ar') ? Request::old('description_ar') : $product_edit->getTranslation( 'description', 'ar' ) }}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom07">{{ __('master.image') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom07" type="file" aria-label="file example" name="image" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom04">{{ __('product.discount') }} (%)</label>
                                    <select name="discount" id="discount" class="form-control" value="{{ old('discount') }}">
                                        <option value="" selected>Please select a discount.</option>
                                        <?php
                                            for($d = 0.01 ; $d < 1 ; $d = $d + 0.01){   //for(start => 1% ; end => 99% ; increment=> ++1)
                                        ?>
                                                <option value="{{ $d }}">{{ $d * 100 }}%</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom03">{{ __('product.price') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom03" type="number" name="price"
                                        placeholder="Price in EGP" required="" value="{{ old('price') }}" 
                                        onkeyup="$('#gain_value_final_price_product_create').val($(this).val() - ( $(this).val() * $('#discount').val() ) );"/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-4 mt-3">
                                    <input class="form-control" id="gain_value_final_price_product_create" placeholder="Price After Discount/Final Price" disabled>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault08">{{ __('product.product_category') }} <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control" value="{{ Request::old('category_id') ? Request::old('category_id') : $product_category->name }}">
                                        <option value="" selected>No category selected.</option>
                                        @foreach($product_category as $p_cat)
                                            <option value="{{ $p_cat->id }}">
                                                @if($p_cat->parent_id == null)
                                                    {{ $p_cat->name }}
                                                @else
                                                    ({{ $p_cat->name }}) &RightArrow; {{ $p_cat->subCategory->name }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('product.keywords') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="keywords" placeholder="ex: Clips, Music, etc." value="{{ old('keywords') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('product.meta_description') }}</label>
                                    <textarea class="form-control" id="validationCustom01"
                                        name="meta_description" placeholder="ex: Manufacturer, made in china" value="{{ old('meta_description') }}"> </textarea>
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
