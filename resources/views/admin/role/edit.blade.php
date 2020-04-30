@extends('layouts.admin.app', ['page' => __('Roles'), 'pageSlug' => 'roles'])

@section('content')
	<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Role Edit') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.roles.update',$role) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ $role->name }}"  autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Permission') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="btn-group bootstrap-select show-tick">
                                                <select class="selectpicker" data-style="btn btn-info" multiple="" title="Choose Permission" data-size="7" tabindex="-98" name="permission[]">
                                                    <option disabled="">Permission</option>
                                                    @foreach($permission as $key => $value)
                                                        <option 
                                                        @foreach($role->permissions as $key => $permiss)
                                                            {{ $permiss->id == $value->id ? 'selected' : '' }}
                                                        @endforeach
                                                        value="{{ $value->id }}">{{ $value->name }}
                                                    </option>
                                                    @endforeach
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