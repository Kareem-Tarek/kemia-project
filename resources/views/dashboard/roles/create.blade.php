@extends('layouts.admin.master')

@section('title')
    laravel 9
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('role.add_role') }}</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('role.role') }}</a></li>
        <li class="breadcrumb-item active">{{ __('role.add_role') }}</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('role.add_role') }}</h5>

                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="{{ route('roles.store') }}">
                            @csrf

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('role.add_role') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" />
                                </div>

                            </div>

                            <div class="row g-1 ">
                                @foreach ($permission as $value)
                                    <div class="col-md-3 mb-3">
                                        <div class="form-check">
                                            <div class="checkbox p-0">
                                                <input class="form-check-input" id="{{ $value->id }}" type="checkbox"
                                                    name="permission[]" value="{{ $value->id }}" />
                                                <label class="form-check-label"
                                                    for="{{ $value->id }}">{{ $value->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
