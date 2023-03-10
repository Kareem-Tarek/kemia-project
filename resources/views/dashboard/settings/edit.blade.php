@extends('layouts.admin.master')

@section('title')
    {{ __('setting.edit_setting') }}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('setting.setting') }}</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">{{ __('setting.setting') }}</a></li>
        <li class="breadcrumb-item active"> {{ __('setting.edit_setting') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('setting.setting') }}</h5>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'ar') active  @endif" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">{{__('master.arabic')}}<div class="media"></div></a></li>
                            <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'en') active  @endif" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'en') true @else false @endif">{{__('master.english')}}</a></li>
                        </ul>

                        <form class="needs-validation" novalidate="" method="post" action="{{ route('settings.update', $setting->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade mt-4 @if(LaravelLocalization::getCurrentLocale() == 'en') show active @endif" id="en" role="tabpanel" aria-labelledby="en-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.title') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_en" placeholder="ex: Black shirt" value="{{ Request::old('title_en') ? Request::old('title_en') : $setting->getTranslation( 'title', 'en' )}}" />
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_en" placeholder="ex: color, size, about setting" value="{{ Request::old('description_en') ? Request::old('description_en') : $setting->getTranslation( 'description', 'en' )}}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.short_description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="short_description_en" placeholder="ex: color, size, about setting" value="{{ Request::old('short_description_en') ? Request::old('short_description_en') : $setting->getTranslation( 'short_description', 'en' )}}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>
                                </div>
                                

                                <div class="tab-pane fade mt-4 @if(LaravelLocalization::getCurrentLocale() == 'ar') show active @endif" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.title') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_ar" placeholder="ex: Black shirt" value="{{ Request::old('title_ar') ? Request::old('title_ar') : $setting->getTranslation( 'title', 'ar' )}}" />
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_ar" placeholder="ex: color, size, about setting" value="{{ Request::old('description_ar') ? Request::old('description_ar') : $setting->getTranslation( 'description', 'ar' )}}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.short_description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="short_description_ar" placeholder="ex: color, size, about setting" value="{{ Request::old('short_description_ar') ? Request::old('short_description_ar') : $setting->getTranslation( 'short_description', 'ar' )}}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault08">{{ __('setting.user_name') }} <span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-control" value="{{ Request::old('user_id') ? Request::old('user_id') : $setting->user_id }}" required>
                                        <option value="" selected>No users selected </option>
                                        @forelse($users as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == $setting->user_id ? 'selected'  : '' }}>{{ $user->name }}</option>
                                            @empty
                                        @endforelse
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.phone') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="phone" placeholder="ex: +201110000 " value="{{ Request::old('phone') ? Request::old('phone') : $setting->phone }}" required/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.phone2') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="phone2" placeholder="ex: +201110000 " value="{{ Request::old('phone2') ? Request::old('phone2') : $setting->phone2 }}"/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.email') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="email" placeholder="ex: example@email.com " value="{{ Request::old('email') ? Request::old('email') : $setting->email }}" required/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.whatsApp') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="whatsApp" placeholder="ex: +201110000 " value="{{ Request::old('whatsApp') ? Request::old('whatsApp') : $setting->whatsApp }}" required/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.facebook') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="facebook" placeholder="ex: https://www.facebook.com " value="{{ Request::old('facebook') ? Request::old('facebook') : $setting->facebook }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
 
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.twitter') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="twitter" placeholder="ex: https://twitter.com/ " value="{{ Request::old('twitter') ? Request::old('twitter') : $setting->twitter }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
 
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.instagram') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="instagram" placeholder="ex: https://instagram.com/ " value="{{ Request::old('instagram') ? Request::old('instagram') : $setting->instagram }}" />
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
