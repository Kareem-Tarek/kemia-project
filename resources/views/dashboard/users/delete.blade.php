@extends('layouts.admin.master')

@section('title')
    {{ __('user.deleted_users') }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('user.user') }}</h3>
        @endslot
        <li class="breadcrumb-item active">{{ __('user.deleted_users') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table-striped display table-bordered @if($users->count() == 0) d-none @endif" id="responsive">
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
                                                    <h6><span class="badge badge-success">{{ ucfirst($user->status) }}</span></h6>
                                                @elseif($user->status == "inactive")
                                                    <h6><span class="badge badge-info">{{ ucfirst($user->status) }}</span></h6>
                                                {{-- @else($user->status == "block")--}}
                                                @else
                                                    <h6><span class="badge badge-danger">{{ ucfirst($user->status) }}</span></h6>
                                                @endif
                                            </td>
                                            <td>
                                                <div style="display: flex;">
                                                    @can('user-restore')
                                                        <a class="btn btn-outline-success-2x" style="margin:0 20px;" href="{{ route('users.restore', $user->id) }}">{{ __('master.restore') }}</a>
                                                    @endcan

                                                    @can('user-forceDelete')
                                                        <form action="{{ route('users.forceDelete', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input style="border-color: #d22d3d;" class="btn btn-outline-danger-2x" value="{{ __('master.permanent_delete') }}" type="submit"
                                                            onclick="return confirm('{{ __('user.permanent_delete')}} ({{ $user->name }})');">
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-secondary text-center h5">{{__('user.empty_deleted_foresle_msg') }}</div>
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
