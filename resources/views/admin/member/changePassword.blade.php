<script>
    var tmpexpired = "{{$member_data->expired_date}}";
  </script>
<md-toolbar style="min-height:40px;" class="btn btn-primary radius">
  <div class="md-toolbar-tools" style="height:40px;">
    <h2>@lang('membertable.tb_name') @lang('membertable.changepass')</h2>
    <span flex></span>
    <md-button class="md-icon-button" ng-click="cancel()">
      <md-icon md-svg-src="/images/ic_close_white_24px.svg" aria-label="Close dialog"></md-icon>
    </md-button>
  </div>
</md-toolbar>
<div class="pd-20" ng-controller="memberCtrl" ng-init="init()">
  <div class="Huiform">
    <form ng-submit="changePassword()" method="post">
      <table class="table table-bg">
        <tbody>
          <input type="hidden" id="id" value="{{$member_data->id}}"></td>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.password')</th>
            <td><input id="passwordone" style="width:300px" class="input-text" minlength="6" ng-model="passwordone" type="password" required></td>
          </tr>     
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('auth.confirmpassword')</th>
            <td><input id="passwordtwo" style="width:300px" class="input-text" minlength="6" ng-model="passwordtwo" type="password" required></td>
          </tr>      
          <tr>
            <th></th>
            <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> @lang('content.modify')</button></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
  
</div>

