@extends('layouts.admin.app', ['page' => __('Categories'), 'pageSlug' => 'categories'])

@section('content')
	<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Categories Add') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.categories.store') }}" autocomplete="off"  enctype="multipart/form-data">
                            @csrf
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Banner') }}</label>
                                    <div class="col-sm-7">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="https://black-dashboard-pro-laravel.creative-tim.com/black/img/image_placeholder.jpg" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-new">{{ __('Select Image') }}</span>
                                                <span class="fileinput-exists">{{ __('Change') }}</span>
                                                <input type="file" name="banner" id="input-picture" class="form-control {{ $errors->has('banner') ? ' is-invalid' : '' }}">
                                                @include('admin.alerts.feedback', ['field' => 'banner'])
                                                </span>
                                                <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}"  autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Sort order') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('sort_order') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('sort_order') ? ' is-invalid' : '' }}" name="sort_order" id="input-sort_order" type="number" placeholder="{{ __('sort order') }}" value="{{ old('sort_order') }}"  autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'sort_order'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Parent</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('parent') ? ' has-danger' : '' }}">
                                            <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="parent" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
                                                    <option value="0">Is Parent</option>
                                                    @foreach($data_tree as $key => $value)
                                                        <option value="{{ $value['id'] }}">{{ str_repeat('-', $value['level'] ).' '.$value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                             @include('admin.alerts.feedback', ['field' => 'parent'])
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