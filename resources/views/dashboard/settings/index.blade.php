@extends('layouts.admin.master')

@section('title')
    {{ __('setting.setting') }}
@endsection

{{-- @push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
@endpush --}}

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('setting.setting') }}</h3>
        @endslot
        <li class="breadcrumb-item active">{{ __('setting.setting') }}</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table-striped display table-bordered @if($settings->count() == 0) d-none @endif   " id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('setting.user_name') }}</th>
                                        <th>{{ __('setting.title') }}</th>
                                        <th>{{ __('setting.description') }}</th>
                                        <th>{{ __('setting.short_description') }}</th>
                                        <th>{{ __('setting.phone') }}</th>
                                        <th>{{ __('setting.phone2') }}</th>
                                        <th>{{ __('setting.email') }}</th>
                                        <th>{{ __('setting.whatsApp') }}</th>
                                        <th>{{ __('setting.facebook') }}</th>
                                        <th>{{ __('setting.twitter') }}</th>
                                        <th>{{ __('setting.instagram') }}</th>

                                        <th>{{ __('master.processes') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($settings as $setting)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $setting->user->name ?? __('master.null') }}</td>
                                            <td>{{ $setting->title }}</td>
                                            <td>{{ $setting->description ?? __('master.null') }}</td>
                                            <td>{{ $setting->short_description ?? __('master.null') }}</td>
                                            <td>{{ $setting->phone }}</td>
                                            <td>{{ $setting->phone2 }}</td>
                                            <td>{{ $setting->email }}</td>
                                            <td><a href="http://wa.me/+20{{ $setting->whatsApp }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></td>
                                            <td><a href="{{ $setting->facebook ?? 'javascript:void(0)' }}" target="_blank"><i class="fa-brands fa-facebook"></i></a></td>
                                            <td><a href=" {{ $setting->twitter ?? 'javascript:void(0)' }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></td>
                                            <td><a href="{{ $setting->instagram ?? 'javascript:void(0)' }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></td>
                                            <td>
                                                <div style="display: flex;">
                                                    @can('setting-edit')
                                                        <a class="btn btn-outline-primary-2x" style="margin:0 20px;"
                                                            href="{{ route('settings.edit', $setting->id) }}">{{ __('master.edit') }}</a>
                                                    @endcan

                                                    @can('setting-delete')
                                                        <form action="{{ route('settings.destroy', $setting->id) }}" method="post">
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
                                            <div class="alert alert-secondary text-center h5">{{ __('setting.index_forelse_loop_empty_msg_1') }} <a href="{{ route('settings.create') }}" class="text-decoration-underline fw-bold text-dark">{{ __('setting.index_forelse_loop_empty_msg_2') }}</a> {{ __('setting.index_forelse_loop_empty_msg_3') }}</div>
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
        <script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush
@endsection
