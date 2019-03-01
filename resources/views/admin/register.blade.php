@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('auth.register')</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('identify') ? ' has-error' : '' }}">
                            <label for="identify" class="col-md-3 control-label">@lang('auth.identify')</label>

                            <div class="col-md-6">
                                <input id="identify" type="text" class="form-control" name="identify" required autofocus>

                                @if ($errors->has('identify'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identify') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('member_name') ? ' has-error' : '' }}">
                            <label for="member_name" class="col-md-3 control-label">@lang('auth.username')</label>

                            <div class="col-md-6">
                                <input id="member_name" type="text" class="form-control" name="member_name" value="{{ old('member_name') }}" required autofocus>

                                @if ($errors->has('member_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-3 control-label">@lang('auth.phone')</label>

                            <div class="col-md-6">
                                <input id="phone" class="form-control" name="phone" value="{{ old('phone') }}" required pattern="[0-9]{9,11}" >

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('province_id') || $errors->has('country_id') ||  $errors->has('dong_id') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-3 control-label">@lang('auth.location')</label>

                            <div class="col-md-6">
                                <input id="address" class="form-control" name="address" value="{{ old('address') }}" required>  
                                @if ($errors->has('province_id') || $errors->has('country_id') ||  $errors->has('dong_id'))
                                    <span class="help-block">
                                        <strong>중개사무소주소를 바로 입력하세요</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="office_tele" class="col-md-3 control-label">@lang('officetable.office_tele')</label>

                            <div class="col-md-4">
                                <input id="office_tele" ng-model="office_tele" class="col-md-4 form-control" name="office_tele" value="{{ old('phone') }}" pattern="[0-9]{9,11}" >
                            </div>
                            <div class="btn btn-success radius" ng-click="OfficeFactory.getOffice(office_tele)"><i class="icon-search"></i> 중개사무소 찾기</div>
                        </div>
                        <div class="form-group">
                            <label for="office_id" class="col-md-3 control-label">@lang('officetable.office_name')</label>

                            <div class="col-md-6">
                            <select class="form-control" ng-model="office_id" id="office_id" name="office_id" style="width:100%" ng-options="x.id as x.office_name for x in OfficeFactory.OfficeResult()">
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <label class="col-md-1" style="padding-top:7px;padding-right: 0px;">직접입력</label>

                            <div class="col-md-5">
                                <input id="office_direct" class="form-control" name="office_direct" value="" >
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-3 control-label">@lang('auth.position')</label>

                            <div class="col-md-6">
                            <select class="form-control" id="position" name="position" style="width:100%">
                                <option value=""></option>
                                <option value="대표">대표</option>
                                <option value="공동대표">공동대표</option>
                                <option value="소장">소장</option>
                                <option value="소속공인중개사">소속공인중개사</option>
                                <option value="실장">실장</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label"></label>
                            <label class="col-md-1" style="padding-top:7px">기타</label>

                            <div class="col-md-5">
                                <input id="position_extra" class="form-control" name="position_extra" value="" >
                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>직책을 입력하세요</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">@lang('auth.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">@lang('auth.confirmpassword')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">@lang('auth.question')</label>

                            <div class="col-md-6">
                            <select class="form-control" ng-model="question_id" id="question_id" name="question_id" style="width:100%" ng-options="x.id as x.question for x in QuestionFactory.getQuestion()" required>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">@lang('auth.answer')</label>

                            <div class="col-md-6">
                                <input id="answer" class="form-control" name="answer" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.register')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
