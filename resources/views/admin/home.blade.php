@extends('admin.layouts.app')
@extends('admin.layouts.menubar')
@section('content')
 <section class="Hui-article" id="sectiontab">
    <div id="Hui-tabNav" class="Hui-tabNav">
      <div class="Hui-tabNav-wp">
        <ul id="min_title_list" class="acrossTab cl">       
          <li ng-class="{active:activeTag==$index}" ng-click="curTagActive($index)" ng-repeat="item in getTagInfo()">
            <span>~!item.title!~</span><i ng-click="curTagRemove($index)"></i>
            <em></em>
          </li>       
        </ul>
      </div>
      <div class="Hui-tabNav-more btn-group">
          <a id="js-tabNav-prev" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-backward"></i></a>
          <a id="js-tabNav-next" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-forward"></i></a>
      </div>
    </div>
    <div id="iframe_box" class="Hui-articlebox">
      <div class="show_iframe">
        <div style="display:none" class="loading"></div>
        <iframe scrolling="yes" frameborder="0" ng-src="~!item.link!~" ng-repeat="item in getTagInfo()" ng-show="activeTag==$index"></iframe>
      </div>
    </div>
  </section>
@endsection