<div class="modal fade" id="addimage" tabindex="-1" role="dialog">
    <div class="modal-dialog w-75">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="tim-icons icon-simple-remove"></i>
          </button>
          <h6 class="title title-up">Add Product Image And Attribute</h6>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('key_attr') ? ' has-danger' : '' }}">
                        <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
                            <select class="selectpicker change_attb col-sm-12 pl-0 pr-0" name="key_attr" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
                                <option disabled selected >Choose</option>
                                @foreach($key_attr as $key => $value)
                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                         @include('admin.alerts.feedback', ['field' => 'key_attr'])
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('value_attr') ? ' has-danger' : '' }}">
                        <input class="form-control form-control-alternative{{ $errors->has('value_attr') ? ' is-invalid' : '' }}" name="value_attr" id="input-value_attr" type="text" placeholder="{{ __('Value') }}" value="{{ old('value_attr') }}"  autofocus>
                        @include('admin.alerts.feedback', ['field' => 'value_attr'])
                    </div>
                </div>
                <div class="col-sm-2 clr-pickr">
                    <div class="color-picker"></div>
                </div>
                <div class="col-sm-4">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<style>
    .modal input,.modal .form-control:focus{
        color: #a1a7ab;
    }
</style>