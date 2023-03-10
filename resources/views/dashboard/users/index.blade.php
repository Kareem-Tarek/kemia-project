@extends('layouts.admin.master')

@section('title')
    {{ __('user.user') }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('user.user') }}</h3>
        @endslot
        <li class="breadcrumb-item active">{{ __('user.user') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table-striped display table-bordered" id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('master.image') }}</th>
                                        <th>{{ __('master.name') }}</th>
                                        <th>{{ __('master.email') }}</th>
                                        <th>{{ __('master.phone') }}</th>
                                        <th>{{ __('master.view') }}</th>
                                        <th>{{ __('role.role') }}</th>
                                        <th>{{ __('master.status') }}</th>
                                        <th>{{ __('master.processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img style="max-width: 100px;max-height: 100px;" src="{{ $user->getFirstMediaUrl('user') != null ?  $user->getFirstMediaUrl('user') : asset('assets/images/dashboard/1.png')}}"></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>{{ $user->view }}</td>
                                            <td>{{ ucfirst($user->roles_name) }}</td>
                                            <td class="text-center">
                                                @if($user->status == "active")
                                                    <h6><span class="badge badge-success">{{ __('user.active') }}</span></h6>
                                                @elseif($user->status == "inactive")
                                                    <h6><span class="badge badge-info">{{ __('user.inactive') }}</span></h6>
                                                @else
                                                    <h6><span class="badge badge-danger">{{ __('user.block') }}</span></h6>
                                                @endif
                                            </td>
                                            <td>
                                                <div style="display: flex;">
                                                    @can('user-edit')
                                                        <a class="btn btn-outline-primary-2x" style="margin:0 20px;" href="{{ route('users.edit', $user->id) }}">{{ __('master.edit') }}</a>
                                                    @endcan

                                                    @can('user-delete')
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input style="border-color: #d22d3d;" class="btn btn-outline-danger-2x" value="{{ __('master.delete') }}" type="submit">
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                        @empty

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
