@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('auth.adminlogin')</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="identify" class="col-md-4 control-label">@lang('auth.identify')</label>

                            <div class="col-md-6">
                                <input id="identify"  class="form-control" name="identify" value="{{ old('identify') }}" required autofocus>
                                <!-- @if ($errors->has('identify'))
                                    <span class="help-block">
                                        <strong>회원ID를 바로 입력해주세요</strong>
                                    </span>
                                @endif -->
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('auth.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <!-- @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>암호를 바로 입력하세요</strong>
                                </span>
                            @endif -->
                            </div>
                        </div>
                        @if ($status == -1)
                            <div class="form-group{{ $status == -1 ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    <span class="help-block">
                                        <strong>@lang('auth.loginError')</strong>
                                    </span>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" style="margin-top: 4px;" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('auth.remember')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.login')
                                </button>

                                <a class="btn btn-link" href="/admin/forgetPass">
                                    @lang('auth.forgot')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
