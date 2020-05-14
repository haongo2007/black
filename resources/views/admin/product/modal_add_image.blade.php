
<div class="modal fade" id="addimage" tabindex="-1" role="dialog">
    <div class="modal-dialog w-75">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="tim-icons icon-simple-remove"></i>
          </button>
          <h6 class="title title-up">Add Product Image And Attribute</h6>
        </div>
        <div class="modal-body appdn">
            <div class="row clone" id="1">
                <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('key_attr') ? ' has-danger' : '' }}">
                        <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
                            <select class="selectpicker cattb col-sm-12 pl-0 pr-0" name="key_attr[]" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
                                <option disabled selected >Choose</option>
                                @foreach($key_attr as $key => $value)
                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                         @include('admin.alerts.feedback', ['field' => 'key_attr'])
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('value_attr.0') ? ' has-danger' : '' }}">
                        <input class="form-control form-control-alternative{{ $errors->has('value_attr.0') ? ' is-invalid' : '' }}" name="value_attr[]" id="input-value_attr" type="text" placeholder="{{ __('Value') }}" value="{{ old('value_attr.0') }}"  autofocus>
                        @include('admin.alerts.feedback', ['field' => 'value_attr.0'])
                    </div>
                </div>
                <div class="col-sm-2 clr-pickr">
                    <div class="color-picker-1"></div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('image1') ? ' has-danger' : '' }}">
                        <input type="file" name="image1[]" accept="image/*" multiple class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}">
                        @include('admin.alerts.feedback', ['field' => 'image1'])
                    </div>  
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success add_more">Add More</button>
        </div>
      </div>
    </div>
</div>
<style>
    .modal input,.modal .form-control:focus{
        color: #a1a7ab;
    }
    .modal .modal-content{
        max-height: 90vh;
        overflow: auto;
    }
</style>