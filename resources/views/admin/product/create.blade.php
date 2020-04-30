@extends('layouts.admin.app', ['page' => __('Product'), 'pageSlug' => 'products'])
@push('css')
<link href="{{ asset('black') }}/css/monolith.min.css" rel="stylesheet" />
<link href="{{ asset('black') }}/css/imageuploadify.min.css" rel="stylesheet" />

@endpush
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
                            	<div class="col-sm-6">
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
	                                            <input class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'name'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">{{ __('Price') }}</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
	                                            <input class="money form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price" type="text" placeholder="{{ __('Price') }}" value="{{ old('price') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'price'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">{{ __('Discount') }}</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
	                                            <input class="money form-control form-control-alternative{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" id="input-discount" type="text" placeholder="{{ __('Discount') }}" value="{{ old('discount') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'discount'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">{{ __('In stock') }}</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-group{{ $errors->has('in_stock') ? ' has-danger' : '' }}">
	                                            <input class="form-control form-control-alternative{{ $errors->has('in_stock') ? ' is-invalid' : '' }}" name="in_stock" id="input-stock" type="text" placeholder="{{ __('In stock') }}" value="{{ old('in_stock') }}"  autofocus>
	                                            @include('admin.alerts.feedback', ['field' => 'in_stock'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">Categories</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-group{{ $errors->has('categories_id') ? ' has-danger' : '' }}">
	                                            <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
	                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="categories_id" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
	                                                    @foreach($categories as $key => $value)
	                                                        <option value="{{ $value['id'] }}">{{ str_repeat('-', $value['level'] ).' '.$value['name'] }}</option>
	                                                    @endforeach
	                                                </select>
	                                            </div>
	                                             @include('admin.alerts.feedback', ['field' => 'categories_id'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <label class="col-sm-3 col-form-label">Brand</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-group{{ $errors->has('brand_id') ? ' has-danger' : '' }}">
	                                            <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
	                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="brand_id" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
	                                                    @foreach($brand as $key => $value)
	                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
	                                                    @endforeach
	                                                </select>
	                                            </div>
	                                             @include('admin.alerts.feedback', ['field' => 'brand_id'])
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                	<label class="col-sm-3 col-form-label">Tags</label>
	                                    <div class="col-sm-9">
	                                    	<div class="form-group">
		                                        <div class="bootstrap-tagsinput"></div>
		                                        <input type="text" name="tags[]" value="some-values1" class="tagsinput" data-role="tagsinput" data-color="danger" style="display: none;">
		                                    </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
									<div class="form-group">
										<textarea id="editor1" name="description" class="form-control form-control-alternative"></textarea>
										@include('admin.alerts.feedback', ['field' => 'description'])
									</div>
								</div>
							</div>
							@include('admin.product.modal_add_image')
                            <div class="text-center">
								<button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
								<button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addimage">{{ __('Add Image') }}</button>
                            </div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
    <style>
    	.bootstrap-tagsinput:first-child{
    		display: none;
		}
		.clr-pickr .pickr{
			display: none;
		}
    </style>
@stop
@push('js')
<!-- ckeditor js-->
<script src="{{ asset('black/js/plugins') }}/editor/ckeditor/ckeditor.js"></script>
<script src="{{ asset('black/js/plugins') }}/editor/ckeditor/styles.js"></script>
<script src="{{ asset('black/js/plugins') }}/editor/ckeditor/adapters/jquery.js"></script>
<script src="{{ asset('black/js/plugins') }}/editor/ckeditor/ckeditor.custom.js"></script>
<script src="{{ asset('black') }}/js/plugins/pickr.es5.min.js"></script>
<script src="{{ asset('black') }}/js/imageuploadify.min.js"></script>
<script src="{{ asset('black') }}/myscript/simple.money.format.js"></script>
<script src="{{ asset('black') }}/myscript/pickr.js"></script>
<script src="{{ asset('black') }}/myscript/product.js"></script>
@endpush