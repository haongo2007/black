@extends('layouts.admin.app', ['page' => __('Permissions'), 'pageSlug' => 'permissions'])

@section('content')
	<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Permission Edit') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.permissions.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.permissions.update',$permission) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ $permission->name }}"  autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'name'])
                                        </div>  
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="col-form-label">{{ __('Page') }}</label>
                                        <div class="form-group">
                                            <div class="btn-group bootstrap-select show-tick">
                                                <select class="selectpicker pagge" data-style="btn btn-info" title="Choose Page" data-size="7" tabindex="-98" name="page">
                                                    @foreach($page as $key => $val)
                                                        <option actionpermission="{{ $permission->action }}" action="{{ json_encode($val) }}" {{ $permission->page == $key ? 'selected' : '' }} value="{{ $key }}">{{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="col-form-label">{{ __('Action') }}</label>
                                        <div class="form-group">
                                            <div class="btn-group bootstrap-select show-tick">
                                                <select class="selectpicker acction" data-style="btn btn-info" title="Choose Action" data-size="7" tabindex="-98" name="action">
                                                    <option disabled >Choose page first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <script>
        var data = $('.pagge option:selected').attr('action');
        var actpermiss = $('.pagge option:selected').attr('actionpermission');
        data = JSON.parse(data);
        var el = '';
        $.each(data.action, function (index, value) { 
            if(actpermiss == value){
                el += '<option selected value="'+value+'" >'+value+'</option>';
            }else{
                el += '<option value="'+value+'" >'+value+'</option>';
            }
        });
        $('.selectpicker.acction').html(el);
        $('.selectpicker.acction').selectpicker('refresh');

        $('.pagge').change(function(){
            var data = $(this).children('option:selected').attr('action');
            data = JSON.parse(data);
            var el = '';
            $.each(data.action, function (index, value) { 
                el += '<option value="'+value+'" >'+value+'</option>';
            });
            $('.selectpicker.acction').html(el);
            $('.selectpicker.acction').selectpicker('refresh');
        })
    </script>
@endpush