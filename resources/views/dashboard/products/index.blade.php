@extends('layouts.admin.master')

@section('title')
    {{ __('product.product') ?? 'Product translation error' }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
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
                        <div class="dt-ext table-responsive">

                            <table class="display" id="responsive">

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
                                        <th>{{ __('product.product_sub_category') }}</th>

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
                                                    <span class="text-light font-weight-bold bg-dark p-1 rounded">
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
                                            <td>{{ $product->keywords ?? __('master.null') }}</td>
                                            <td>{{ Str::words($product->description, 7, '...') ?? __('master.null') }}</td>
                                            <td>{{ $product->meta_description ?? __('master.null') }}</td>
                                            <td>{{ $product->category->name ?? __('master.null') }}</td>
                                            <td>{{ $product->category->parent_id ?? __('master.null') }}</td>
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
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
        <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
        <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    @endpush
@endsection
