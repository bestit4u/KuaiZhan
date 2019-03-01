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
<body ng-controller="@yield('controller')" style="background-color:#fff">
    <nav class="Hui-breadcrumb"><i class="icon-home"></i> Betting Admin <span class="c-gray en">&gt;</span> @yield('category')<span class="c-gray en">&gt;</span> @yield('subcategory')<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
    <div class="pd-20">
        <md-content layout-padding ng-cloak class="datepickerdemoValidations" style="padding:0px; background-color:#fff">
            <div class="text-c"> @lang('content.date')：
            <md-datepicker ng-model="fromDate"  md-placeholder="@lang('content.enterStartDate')"></md-datepicker>
            <md-datepicker ng-model="endDate" md-placeholder="@lang('content.enterEndDate')"></md-datepicker>
            <input type="text" class="input-text" placeholder="@yield('search_place')" ng-model="keyword" ng-keypress="dbmanage.KeyPress($event)" style="width:250px; margin-left: 10px">
            <a class="btn btn-success" ng-href="~!searchLink(fromDate, endDate, keyword)!~" id="btnSearch" ><i class="icon-search"></i> @lang('content.search')</a>
            </div>
            @yield('advance_search')
        </md-content>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            @yield('control_buttons')
            
            <span class="r">@lang('content.total') <strong>{{$items->total()}}</strong> @lang('content.count')</span>
        </div>
        @yield('link_table')
        <div class="pageNav">
            {{$items->appends($searchObj)->links()}}
        </div>
    </div>
</body>
<script>
  var searchObj = @json($searchObj);
  var title = "@lang('content.warning')";
  var delAllMessage = "@lang('content.deleteAllMessage')";
  var delMessage = "@lang('content.deleteMessage')";
  var successMessage = "@lang('content.successMessage')";
  var failMessage = "@lang('content.failMessage')";
  var ok = "@lang('content.ok')";
  var cancel =  "@lang('content.cancel')";
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/angular.js') }}"></script>
<script src="{{ asset('js/angular-animate.js') }}"></script>
<script src="{{ asset('js/angular-aria.min.js') }}"></script>
<script src="{{ asset('js/angular-messages.min.js') }}"></script>
<script src="{{ asset('js/angular-material.js') }}"></script>
<script src="{{ asset('js/linkapp.module.js') }}"></script>
@yield('js')
<script src="{{ asset('js/dbmanage.service.js') }}"></script>
</style>
</html>