@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('auth.resetpassword')</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" ng-submit="resetPass.resetpass(identify,question_id,answer,pwd1,pwd2)">

                        <div class="form-group" ng-class="{'has-error':resetPass.isMemberError()}">
                            <label for="identify" class="col-md-4 control-label">@lang('auth.identify')</label>

                            <div class="col-md-6">
                                <input id="identify" class="form-control" ng-model="identify" required autofocus>

                                <span class="help-block" ng-show="resetPass.isMemberError()">
                                    <strong>회원이 존재하지 않습니다</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group" ng-class="{'has-error':resetPass.isAnswerError()}">
                            <label for="code" class="col-md-4 control-label">@lang('auth.question')</label>

                            <div class="col-md-6">
                                <select class="form-control" id="question_id" ng-model="question_id" ng-options="x.id as x.question for x in QuestionFactory.getQuestion()"></select>
                            </div>
                        </div>
                        <div class="form-group" ng-class="{'has-error':resetPass.isAnswerError()}">
                            <label for="code" class="col-md-4 control-label">@lang('auth.answer')</label>

                            <div class="col-md-6">
                                <input id="code" class="form-control" ng-model="answer" required autofocus>

                                <span class="help-block" ng-show="resetPass.isAnswerError()">
                                    <strong>질문 대답내용이 잘못되었습니다</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group" ng-class="{'has-error':resetPass.isPassError()}">
                            <label for="pwd1" class="col-md-4 control-label">@lang('auth.password')</label>

                            <div class="col-md-6">
                                <input id="pwd1" class="form-control" type="password" ng-model="pwd1" required autofocus minlength="6">

                                <span class="help-block" ng-show="resetPass.isPassError()">
                                    <strong>두개의 암호가 일치하지 않습니다</strong>
                                </span>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">@lang('auth.confirmpassword')</label>
                            <div class="col-md-6">
                                <input id="pwd2" type="password" class="form-control" ng-model="pwd2" required  minlength="6">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.resetpassword')
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
