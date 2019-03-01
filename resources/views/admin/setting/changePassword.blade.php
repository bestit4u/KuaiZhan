<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}" ng-app="link-app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{'Data Admin Page'}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link href="{{asset('css/H-ui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/H-ui.admin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/angular-material.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('font/font-awesome.min.css')}}"/>
</head> 
<body ng-controller="settingCtrl" style="background-color:#fff">
<div class="pd-20">
  <form class="Huiform" id="loginform" ng-submit="adminChangePassword()" method="post">
    <table class="table table-border table-bordered table-bg">
      <thead>
        <tr>
          <th colspan="2">@lang('membertable.changepass')</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th class="text-r" width="30%">@lang('membertable.oldpass'): </th>
          <td><input name="oldpassword" id="oldpassword" class="input-text" type="password" autocomplete="off" placeholder="@lang('membertable.oldpass')" tabindex="1" datatype="*6-16" nullmsg="Please input old password!" required errormsg="Please input old password!"> 
          </td>
        </tr>
        <tr>
          <th class="text-r">@lang('membertable.password')：</th>
          <td><input name="newpassword" id="newpassword" class="input-text" type="password" autocomplete="off" placeholder="@lang('membertable.password')" tabindex="2" datatype="*6-16" nullmsg="Please input new password!" required errormsg="Please input new password!"> 
          </td>
        </tr>
        <tr>
          <th class="text-r">@lang('auth.confirmpassword')：</th>
          <td><input name="newpassword2" id="newpassword2" class="input-text" type="password" autocomplete="off" placeholder="@lang('auth.confirmpassword')" tabindex="3" datatype="*" recheck="newpassword" nullmsg="Please input new password again!" required errormsg="Please input new password again!"> 
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <button type="submit" class="btn btn-success radius" id="admin-password-save" name="admin-password-save"><i class="icon-ok"></i> @lang('content.modify')</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
</body>
<script src="{{ asset('js/angular.js') }}"></script>
<script src="{{ asset('js/angular-animate.js') }}"></script>
<script src="{{ asset('js/angular-aria.min.js') }}"></script>
<script src="{{ asset('js/angular-messages.min.js') }}"></script>
<script src="{{ asset('js/angular-material.js') }}"></script>
<script src="{{ asset('js/linkapp.module.js') }}"></script>
<script src="{{ asset('js/dbmanage.service.js') }}"></script>
<script src="{{ asset('js/betsetting.controller.js') }}"></script>
</style>
</html>