@extends('layouts.admin.master')

@section('title')
    {{ __('setting.add_setting') }}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3></h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">{{ __('setting.setting') }}</a></li>
        <li class="breadcrumb-item active">{{ __('setting.add_setting') }}</li>
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

                        <form class="needs-validation" novalidate="" method="post" action="{{ route('settings.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade mt-4 @if(LaravelLocalization::getCurrentLocale() == 'en') show active @endif" id="en" role="tabpanel" aria-labelledby="en-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.title') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_en" placeholder="ex: Black shirt" value="{{ old('title_en') }}" />
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_en" placeholder="ex: color, size, about setting" value="{{ old('description_en') }}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.short_description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="short_description_en" placeholder="ex: color, size, about setting" value="{{ old('short_description_en') }}"> </textarea>
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
                                                    name="title_ar" placeholder="ex: Black shirt" value="{{ old('title_ar') }}" />
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_ar" placeholder="ex: color, size, about setting" value="{{ old('description_ar') }}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01">{{ __('setting.short_description') }}</label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="short_description_ar" placeholder="ex: color, size, about setting" value="{{ old('short_description_ar') }}"> </textarea>
                                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault08">{{ __('setting.user_name') }} <span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-control" value="{{ old('user_id') }}" required>
                                        <option value="" selected>{{__('setting.select_user') }}</option>
                                        @forelse($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                        name="phone" placeholder="ex: +201110000 " value="{{ old('phone') }}" required/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.phone2') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="phone2" placeholder="ex: +201110000 " value="{{ old('phone2') }}"/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.email') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="email" placeholder="ex: example@email.com " value="{{ old('email') }}" required/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.whatsApp') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="whatsApp" placeholder="ex: +201110000 " value="{{ old('whatsApp') }}" required/>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.facebook') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="facebook" placeholder="ex: https://www.facebook.com " value="{{ old('facebook') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
 
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.twitter') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="twitter" placeholder="ex: https://twitter.com/ " value="{{ old('twitter') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
 
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('setting.instagram') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="instagram" placeholder="ex: https://instagram.com/ " value="{{ old('instagram') }}" />
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
