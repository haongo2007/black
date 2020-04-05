@extends('layouts.admin.app', ['page' => __('Product'), 'pageSlug' => 'products'])

@section('content')
	<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Product Add') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.products.store') }}" autocomplete="off"  enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">
                            	<div class="col-sm-7">
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
	                                    <div class="col-sm-6">
	                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
	                                            <input class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'name'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">{{ __('Price') }}</label>
	                                    <div class="col-sm-6">
	                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
	                                            <input class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price" type="text" placeholder="{{ __('Price') }}" value="{{ old('price') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'price'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">{{ __('Discount') }}</label>
	                                    <div class="col-sm-6">
	                                        <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
	                                            <input class="form-control form-control-alternative{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" id="input-discount" type="text" placeholder="{{ __('Discount') }}" value="{{ old('discount') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'discount'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">{{ __('In stock') }}</label>
	                                    <div class="col-sm-6">
	                                        <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
	                                            <input class="form-control form-control-alternative{{ $errors->has('stock') ? ' is-invalid' : '' }}" name="stock" id="input-stock" type="text" placeholder="{{ __('In stock') }}" value="{{ old('stock') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'stock'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">Categories</label>
	                                    <div class="col-sm-6">
	                                        <div class="form-group{{ $errors->has('categories') ? ' has-danger' : '' }}">
	                                            <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
	                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="categories" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
	                                                    @foreach($categories as $key => $value)
	                                                        <option value="{{ $value['id'] }}">{{ str_repeat('-', $value['level'] ).' '.$value['name'] }}</option>
	                                                    @endforeach
	                                                </select>
	                                            </div>
	                                             @include('admin.alerts.feedback', ['field' => 'categories'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">Brand</label>
	                                    <div class="col-sm-6">
	                                        <div class="form-group{{ $errors->has('brand') ? ' has-danger' : '' }}">
	                                            <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
	                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="brand" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
	                                                    @foreach($brand as $key => $value)
	                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
	                                                    @endforeach
	                                                </select>
	                                            </div>
	                                             @include('admin.alerts.feedback', ['field' => 'brand'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                	<label class="col-sm-3 col-form-label">Tags</label>
	                                    <div class="col-sm-6">
	                                    	<div class="form-group">
		                                        <div class="bootstrap-tagsinput"></div>
		                                        <input type="text" name="tags[]" value="some-values1,some-values2,some-values3" class="tagsinput" data-role="tagsinput" data-color="danger" style="display: none;">
		                                    </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                	<label class="col-sm-3 col-form-label">Description</label>
	                                    <div class="col-sm-6">
	                                    	<div class="form-group">
		                                        <textarea name="description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
		                                        @include('admin.alerts.feedback', ['field' => 'description'])
		                                    </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-5">
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">Attribute Product</label>
	                                    <div class="col-sm-4">
	                                        <div class="form-group{{ $errors->has('key_attr') ? ' has-danger' : '' }}">
	                                            <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
	                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="key_attr" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
	                                                    @foreach($key_attr as $key => $value)
	                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
	                                                    @endforeach
	                                                </select>
	                                            </div>
	                                             @include('admin.alerts.feedback', ['field' => 'key_attr'])
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-4">
	                                        <div class="form-group{{ $errors->has('value_attr') ? ' has-danger' : '' }}">
	                                            <input class="form-control form-control-alternative{{ $errors->has('value_attr') ? ' is-invalid' : '' }}" name="value_attr" id="input-value_attr" type="text" placeholder="{{ __('Value') }}" value="{{ old('value_attr') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'value_attr'])
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-11">

	                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
	                                            <div class="fileinput-new">
	                                                <img src="https://black-dashboard-pro-laravel.creative-tim.com/black/img/image_placeholder.jpg" alt="...">
	                                            </div>
	                                            <div class="fileinput-preview fileinput-exists"></div>
	                                            <div class="mt-4">
	                                                <span class="btn btn-rose btn-round btn-file">
	                                                <span class="fileinput-new">{{ __('Select Image') }}</span>
	                                                <span class="fileinput-exists">{{ __('Change') }}</span>
	                                                <input type="file" name="image[]" multiple id="input-picture" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}">
	                                                @include('admin.alerts.feedback', ['field' => 'image'])
	                                                </span>
	                                                <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
	                                            </div>
	                                        </div>

	                                    </div>
	                                </div>
	                            </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
						<!-- Plugin -->
						<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" />
						<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    	.bootstrap-tagsinput:first-child{
    		display: none;
    	}
    </style>
@stop
@push('js')
	<script type="text/javascript">
		
    </script>
@endpush