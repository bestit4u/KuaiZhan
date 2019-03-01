@section('menubar')
<aside class="Hui-aside" id="asidetab">
    <input runat="server" id="divScrollValue" type="hidden" value="" />
    <div class="menu_dropdown bk_2">
      <dl  ng-class="{selected:curIndex==0}" >
        <dt ng-click="setCurMenu(0)"><i class="icon-user"></i> @lang('menubar.memberManage')<b></b></dt>
        <dd>
          <ul>
            <li ><a href="javascript:void(0);" ng-click="openTag('@lang("menubar.members")', 'admin/member')">@lang('menubar.members')</a></li>           
          </ul>
        </dd>
      </dl>
      <dl ng-class="{selected:curIndex==1}">
        <dt ng-click="setCurMenu(1)"><i class="icon-tags"></i> @lang('menubar.bettingManage')<b></b></dt>
        <dd>
          <ul>
			      <li><a href="javascript:void(0);" ng-click="openTag('@lang("menubar.bettingItem")', 'admin/item')">@lang('menubar.bettingItem')</a></li>            
          </ul>
        </dd>
      </dl>
      <dl ng-class="{selected:curIndex==2}">
        <dt ng-click="setCurMenu(2)"><i class="icon-cog"></i> @lang('menubar.setting')<b></b></dt>
        <dd>
          <ul>
			      <li><a href="javascript:void(0);" ng-click="openTag('@lang("menubar.changePassword")', 'admin/setting/changePassword')">@lang('menubar.changePassword')</a></li>            
          </ul>
        </dd>
      </dl>
    </div>
  </aside>
  <div class="dislpayArrow" ng-click="navArrowClick()" id="navarrow"><a class="pngfix" href="javascript:;"></a></div>
  <script>
     curIndex = {{$id}};
  </script>
@endsection
