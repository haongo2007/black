@extends('layouts.admin.app', ['page' => __('Product'), 'pageSlug' => 'products'])

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Product') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right mb-3">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">{{ __('Add product') }}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="datatables_info">
                                        <thead class="text-primary">
                                            <tr role="row">
                                                <th scope="col">{{ __('Name') }}</th>
                                                <th scope="col">{{ __('price') }}</th>
                                                <th scope="col">{{ __('Image') }}</th>
                                                <th scope="col">{{ __('Categories') }}</th>
                                                <th scope="col">{{ __('Stock') }}</th>
                                                <th scope="col">{{ __('Creator') }}</th>
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
                url: "{!! route('admin.products.index') !!}",
                type: 'GET',
                },
                columns: [
                    { data: 'name' },
                    { data: 'price'},
                    { data: 'path','searchable': false,'sortable':false},
                    { data: 'get_categories_name.name',},
                    { data: 'in_stock'},
                    { data: 'creator'},
                    { data: 'created_at'},
                    { data: 'action','searchable': false,'sortable':false},
                ],
                "lengthMenu": 
                    [5,10, 25, 50],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users",
                },
            });
        });
    </script>
@endpush