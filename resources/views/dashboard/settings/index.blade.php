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

                            <table class="table-striped display table-bordered @if($all_settings->count() == 0) d-none @endif   " id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('setting.image') }}</th>
                                        <th>{{ __('setting.title') }}</th>
                                        <th>{{ __('setting.discount') }}</th>
                                        <th>{{ __('setting.price') }} ({{ __('setting.egyptian_currency') }})</th>
                                        <th>{{ __('setting.keywords') }}</th>
                                        <th>{{ __('setting.description') }}</th>
                                        <th>{{ __('setting.meta_description') }}</th>
                                        <th>{{ __('setting.setting_category') }}</th>

                                        <th>{{ __('master.processes') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($all_settings as $setting)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ $setting->image }}" alt="{{ $setting->title.'.img' }}" width="100"></td>
                                            <td>{{ $setting->title }}</td>
                                            <td class="text-center">
                                                @if($setting->discount <= 0 || $setting->discount == null)
                                                    —
                                                @else
                                                    <span class="setting-discount-index text-light bg-dark p-1 rounded">
                                                        {{ $setting->discount * 100 }}%
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($setting->discount <= 0 || $setting->discount == null)
                                                    {{ $setting->price }}
                                                @else
                                                    <del class="text-danger">{{ $setting->price }}</del> 
                                                    <span class="text-primary">&RightArrow;</span> 
                                                    <span class="text-success">{{ $setting->price - ($setting->price * $setting->discount) }}</span>
                                                @endif
                                            </td>

                                            <td class="@if($setting->keywords == null) text-center @endif">
                                                @if(LaravelLocalization::getCurrentLocale() == 'en' && $setting->keywords == null || 
                                                    (LaravelLocalization::getCurrentLocale() == 'ar' && $setting->keywords == null))
                                                    —
                                                @else
                                                    {{ $setting->keywords ?? '—' }}
                                                @endif
                                            </td>

                                            <td class="@if($setting->description == null) text-center @endif">
                                                @if(LaravelLocalization::getCurrentLocale() == 'en' && $setting->description == null || 
                                                    (LaravelLocalization::getCurrentLocale() == 'ar' && $setting->description == null))
                                                    —
                                                @else
                                                    {{ Str::words($setting->description, 7, '...') ?? '—' }}
                                                @endif
                                            </td>

                                            <td class="@if($setting->meta_description == null) text-center @endif">
                                                @if(LaravelLocalization::getCurrentLocale() == 'en' && $setting->meta_description == null || 
                                                    (LaravelLocalization::getCurrentLocale() == 'ar' && $setting->meta_description == null))
                                                    —
                                                @else
                                                    {{ $setting->meta_description ?? '—' }}
                                                @endif
                                            </td>
                                            
                                            <td>
                                                @if($setting->category->parent_id == null)
                                                    {{ $setting->category->name }}
                                                @else
                                                    ({{ $setting->category->name }}) &RightArrow; {{ $setting->category->parent_id ?? __('master.ull') }}
                                                @endif
                                            </td>
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
                                            <div class="alert alert-secondary text-center h5">There are no settings yet! <a href="{{ route('settings.create') }}" class="text-decoration-underline fw-bold text-dark">Please add settings</a> and come back again.</div>
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
