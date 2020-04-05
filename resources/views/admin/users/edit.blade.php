@extends('layouts.admin.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.user.update', $user) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Profile Photo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-circle">
                                                <img src="{{ asset('black/img/avatar').'/'.$user->avatar }}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                            <div>
                                                <span class="btn btn-file">
                                                <span class="fileinput-new">{{ __('Select Image') }}</span>
                                                <span class="fileinput-exists">{{ __('Change') }}</span>
                                                <input type="file" name="avatar" id="input-picture">
                                                </span>
                                                <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
                                            </div>
                                        </div>
                                        @include('admin.alerts.feedback', ['field' => 'avatar'])
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('Name') }}" value="{{ old('phone', $user->phone) }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'phone'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>
                                            @include('admin.alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                            <div class="btn-group bootstrap-select col-sm-12 pl-0 pr-0">
                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="role" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
                                                    @foreach($permission as $key => $value)
                                                        <option {{($value['id'] == $user->role_id) ? 'selected' : ''}} value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                             @include('admin.alerts.feedback', ['field' => 'role'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password"> {{ __('Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" input="" type="password" name="password" id="input-password" placeholder="{{ __('Password') }}">
                                            @include('admin.alerts.feedback', ['field' => 'password'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control form-control-alternative" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var role = '{{ $user->role }}';
        console.log(role);
        $(".selectpicker option[value="+role+"]").attr('selected', true);
    </script>
@endpush
