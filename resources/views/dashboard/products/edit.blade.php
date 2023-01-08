@extends('layouts.admin.master')

@section('title')
    {{ __('category.category') }}
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
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post"
                            action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('category.name') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder="ex: ELECTRONICS" value="{{Request::old('name') ? Request::old('name') : $category->name}}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">{{ __('category.sub-category-of') }}</label>
                                        <select name="parent_id" class="form-control" value="{{Request::old('parent_id') ? Request::old('parent_id') : $category->parent_id}}">
                                            <option value="" selected>No sub-category selected.</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected'  : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
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
