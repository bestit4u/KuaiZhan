<md-toolbar style="min-height:40px;" class="btn btn-primary radius">
  <div class="md-toolbar-tools" style="height:40px;">
    <h2>@lang('membertable.tb_name') @lang('content.add')</h2>
    <span flex></span>
    <md-button class="md-icon-button" ng-click="cancel()">
      <md-icon md-svg-src="/images/ic_close_white_24px.svg" aria-label="Close dialog"></md-icon>
    </md-button>
  </div>
</md-toolbar>
<div class="pd-20" ng-controller="memberCtrl">
  <div class="Huiform">
    <form ng-submit="addmember()" method="post">
      <table class="table table-bg">
        <tbody>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.member_id')</th>
            <td><input id="identify" type="text" style="width:300px" class="input-text" ng-model="identify" required></td>
          </tr>
          <tr>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.member_name')</th>
            <td><input id="member_name" type="text" style="width:300px" class="input-text" ng-model="member_name" required></td>
          </tr>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.email')</th>
            <td><input id="email" type="email" style="width:300px" class="input-text" ng-model="email" required></td>
          </tr>                
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.password')</th>
            <td><input id="passwordone" style="width:300px" class="input-text" minlength="6" ng-model="passwordone" type="password" required></td>
          </tr>     
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('auth.confirmpassword')</th>
            <td><input id="passwordtwo" style="width:300px" class="input-text" minlength="6" ng-model="passwordtwo" type="password" required></td>
          </tr>      
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.expired_date')</th>
            <td>              
              <md-datepicker id="expired_date" ng-model="expired_date"  md-placeholder="@lang('membertable.enabled')"></md-datepicker>
            </td>
          </tr>   
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.enabled')</th>
            <td>              
              <input type='checkbox' name='enabled' ng-model="isEnable">
            </td>
          </tr>   
          <tr>
            <th></th>
            <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> @lang('content.add')</button></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>