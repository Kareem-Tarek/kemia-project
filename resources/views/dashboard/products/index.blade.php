@extends('layouts.admin.master')

@section('title')
    {{ __('product.product') ?? 'Product translation error' }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('product.product') }}</h3>
        @endslot
        <li class="breadcrumb-item active">{{ __('product.product') }}</li>
    @endcomponent

    {{-- @if(session()->has('product_created'))
        <div class="alert alert-success text-center mx-auto w-75">
            {{ session()->get('product_created') }}
        </div>
    @elseif(session()->has('product_updated'))
        <div class="alert alert-success text-center mx-auto w-75">
            {{ session()->get('product_updated') }}
        </div>
    @endif --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table-striped display" id="responsive">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('product.image') }}</th>
                                        <th>{{ __('product.title') }}</th>
                                        <th>{{ __('product.discount') }}</th>
                                        <th>{{ __('product.price') }} ({{ __('product.egyptian_currency') }})</th>
                                        <th>{{ __('product.keywords') }}</th>
                                        <th>{{ __('product.description') }}</th>
                                        <th>{{ __('product.meta_description') }}</th>
                                        <th>{{ __('product.product_category') }}</th>

                                        <th>{{ __('master.processes') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($all_products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ $product->image }}" alt="{{ $product->title.'.img' }}" width="100"></td>
                                            <td>{{ $product->title }}</td>
                                            <td class="text-center">
                                                @if($product->discount <= 0 || $product->discount == null)
                                                    —
                                                @else
                                                    <span class="product-discount-index text-light bg-dark p-1 rounded">
                                                        {{ $product->discount * 100 }}%
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->discount <= 0 || $product->discount == null)
                                                    {{ $product->price }}
                                                @else
                                                    <del class="text-danger">{{ $product->price }}</del> 
                                                    <span class="text-primary">&RightArrow;</span> 
                                                    <span class="text-success">{{ $product->price - ($product->price * $product->discount) }}</span>
                                                @endif
                                            </td>

                                            <td class="@if($product->keywords == null) text-center @endif">
                                                {{ $product->keywords ?? '—' }}
                                            </td>

                                            <td class="@if($product->description == null) text-center @endif">
                                                {{ Str::words($product->description, 7, '...') ?? '—' }}
                                            </td>

                                            <td class="@if($product->meta_description == null) text-center @endif">
                                                {{ $product->meta_description ?? '—' }}
                                            </td>
                                            
                                            <td>
                                                @if($product->category->parent_id == null)
                                                    {{ $product->category->name }}
                                                @else
                                                    ({{ $product->category->name }}) &RightArrow; {{ $product->category->parent_id ?? __('master.ull') }}
                                                @endif
                                            </td>
                                            <td>
                                                <div style="display: flex;">
                                                    @can('product-edit')
                                                        <a class="btn btn-outline-primary-2x" style="margin:0 20px;"
                                                            href="{{ route('products.edit', $product->id) }}">{{ __('master.edit') }}</a>
                                                    @endcan

                                                    @can('product-delete')
                                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')     
        <script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush
@endsection
