@extends('layouts.admin.app', ['page' => __('Permissions'), 'pageSlug' => 'permissions'])

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Permission') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right mb-3">
                            <a href="{{ route('admin.permissions.create') }}" class="btn btn-sm btn-primary">{{ __('Add Permission') }}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="datatables_info">
                                        <thead class="text-primary">
                                            <tr role="row">
                                                <th scope="col">{{ __('Id') }}</th>
                                                <th scope="col">{{ __('Name') }}</th>
                                                <th scope="col">{{ __('Creation Date') }}</th>
                                                <th scope="col">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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
@stop
@push('js')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                url: "{!! route('admin.permissions.index') !!}",
                type: 'GET',
                },
                columns: [
                    { data: 'id' },
                    { data: 'name','sortable':false},
                    { data: 'created_at','sortable':false},
                    { data: 'action','searchable': false,'sortable':false},
                ],
                "lengthMenu": 
                    [5,10, 25, 50],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search permission",
                }
            });
        });
    </script>
@endpush