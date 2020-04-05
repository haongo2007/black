@extends('layouts.admin.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Users') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right mb-3">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="datatables_info">
                                        <thead class="text-primary">
                                            <tr role="row">
                                                <th scope="col">{{ __('Photo') }}</th>
                                                <th scope="col">{{ __('Name') }}</th>
                                                <th scope="col">{{ __('Email') }}</th>
                                                <th scope="col">{{ __('Phone') }}</th>
                                                <th scope="col">{{ __('Role') }}</th>
                                                <th scope="col">{{ __('Creation Date') }}</th>
                                                <th scope="col">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('black/img/avatar').'/'.$user->avatar }}" alt="" style="max-width: 100px">
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                    </td>
                                                    <td>
                                                        <span>{{ $user->belongsToPermission->name }}</span>
                                                    </td>
                                                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                @if (auth()->user()->id != $user->id)
                                                                    <form action="{{ route('admin.user.destroy', $user) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a class="dropdown-item" href="{{ route('admin.user.edit', $user) }}">{{ __('Edit') }}</a>
                                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                                    {{ __('Delete') }}
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">{{ __('Edit') }}</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    @include('admin.alerts.success');
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                url: "{!! route('admin.user.index') !!}",
                type: 'GET',
                },
                columns: [
                    { data: 'avatar' },
                    { data: 'name'},
                    { data: 'email'},
                    { data: 'phone'},
                    { data: 'role','sortable':false},
                    { data: 'created_at'},
                    { data: 'action','searchable': false,'sortable':false},
                ],
                "lengthMenu": 
                    [5,10, 25, 50],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users",
                }
            });
        });
    </script>
@endpush
