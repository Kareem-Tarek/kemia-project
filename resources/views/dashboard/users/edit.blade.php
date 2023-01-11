@extends('layouts.admin.master')

@section('title')
    {{ __('user.user_edit') }}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('user.user') }}</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('user.user') }}</a></li>
        <li class="breadcrumb-item active"> {{ __('user.user_edit') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post"
                            action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')


                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required="" value="{{ Request::old('name') ? Request::old('name') : $user->name }}"
                                        name="name" placeholder="ex: Mohamed Samy" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault07">{{ __('master.status') }}</label>
                                    <select class="form-select" id="validationDefault07" required="" name="status" value="{{ Request::old('status') ? Request::old('status') : $user->status }}">
                                        <option selected="" value="">{{ __('user.select_status') }}</option>
                                        <option value="{{ "active" }}" {{ $user->status == "active" ? 'selected'  : '' }}>{{ __('user.active') }}</option>
                                        <option value="{{ "inactive" }}" {{ $user->status == "inactive" ? 'selected'  : '' }}>{{ __('user.inactive') }}</option>
                                        <option value="{{ "block" }}" {{ $user->status == "block" ? 'selected'  : '' }}>{{ __('user.block') }}</option>
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-2">

                                <div class="col-md-6">
                                   <label class="form-label" for="validationCustom03">{{ __('master.phone') }}</label>
                                    <input class="form-control" id="validationCustom03" type="text" name="mobile"
                                        value="{{ Request::old('mobile') ? Request::old('mobile') : $user->mobile }}" required="" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom04">{{ __('master.email') }}</label>
                                    <input class="form-control" id="validationCustom04" type="email" name="email"
                                        value="{{ Request::old('email') ? Request::old('email') : $user->email }}" required="" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom05">{{ __('master.password') }}</label>
                                    <input class="form-control" id="validationCustom05" type="text" name="password"
                                        placeholder="***********" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>


                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault06">{{ __('role.role') }}</label>
                                    <select class="form-select" id="validationDefault06" required="" name="roles_name" value="{{ Request::old('roles_name') ? Request::old('roles_name') : $user->roles_name }}">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}"{{ $user->roles_name == $role ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            {{-- <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault08">{{ __('master.view') }}</label>
                                    <select class="form-select" id="validationDefault08" required="" name="view">
                                        <option selected="" disabled="" value=""> {{ __('master.view') }}</option>
                                        <option value="yes" {{ $user->view == 'yes'? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ $user->view == 'no'? 'selected' : '' }}>No</option>
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div> --}}

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom07">{{ __('master.image') }}</label>
                                    <input class="form-control" id="validationCustom07" type="file"
                                        aria-label="file example" name="photo" />
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
