@extends('layouts.admin.master')

@section('title')
    {{ __('category.category') }}
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('category.category') }}</h3>
        @endslot
        <li class="breadcrumb-item active">{{ __('category.category') }}</li>
    @endcomponent

    {{-- @if(session()->has('category_created'))
        <div class="alert alert-success text-center mx-auto w-75">
            {{ session()->get('category_created') }}
        </div>
    @elseif(session()->has('category_updated'))
        <div class="alert alert-success text-center mx-auto w-75">
            {{ session()->get('category_updated') }}
        </div>
    @endif --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table-striped display table-bordered @if($categories->count() == 0) d-none @endif   " id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('category.name') }}</th>
                                        <th>{{ __('category.status') }}</th>
                                        <th>{{ __('category.parent_id') }}</th>

                                        <th>{{ __('master.processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $category->name }} 
                                                @if($category->parent_id == null) 
                                                    <label style="color: rgb(41, 197, 41);">{{ '(Main Catgeory)' }}</label> 
                                                @else 
                                                    <label style="color: rgb(236, 138, 40);">{{ '(Sub-catgeory)' }}</label> 
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($category->status == "available")
                                                    <h6><span class="badge badge-success">{{ ucfirst($category->status) }}</span></h6>
                                                @else
                                                    <h6><span class="badge badge-danger">{{ ucfirst($category->status) }}</span></h6>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                {{ $category->subCategory->name ?? '—' }}
                                            </td>

                                            <td>
                                                <div style="display: flex;">
                                                    @can('category-edit')
                                                        <a class="btn btn-outline-primary-2x" style="margin:0 20px;"
                                                            href="{{ route('categories.edit', $category->id) }}">{{ __('master.edit') }}</a>
                                                    @endcan

                                                    @can('category-delete')
                                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input style="border-color: #d22d3d;"
                                                                class="btn btn-outline-danger-2x"
                                                                value="{{ __('master.delete') }}" type="submit">

                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-secondary text-center h5">There are no categories yet! <a href="{{ route('categories.create') }}" class="text-decoration-underline fw-bold text-dark">Please add categories/sub-categories</a> and come back again!</div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    @endpush
@endsection
