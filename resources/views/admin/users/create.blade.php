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
                        <form method="post" action="{{ route('admin.user.store') }}" autocomplete="off"  enctype="multipart/form-data">
                            @csrf
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="number" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" required>
                                            @include('admin.alerts.feedback', ['field' => 'phone'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
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
                                                    @foreach($role as $key => $value)
                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
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
                                            <input class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" input="" type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" required>
                                            @include('admin.alerts.feedback', ['field' => 'password'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control form-control-alternative" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" required>
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
@endsection
