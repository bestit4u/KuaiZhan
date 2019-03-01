<script>
    var tmpexpired = "{{$member_data->expired_date}}";
  </script>
<md-toolbar style="min-height:40px;" class="btn btn-primary radius">
  <div class="md-toolbar-tools" style="height:40px;">
    <h2>@lang('membertable.tb_name') @lang('content.modify')</h2>
    <span flex></span>
    <md-button class="md-icon-button" ng-click="cancel()">
      <md-icon md-svg-src="/images/ic_close_white_24px.svg" aria-label="Close dialog"></md-icon>
    </md-button>
  </div>
</md-toolbar>
<div class="pd-20" ng-controller="memberCtrl" ng-init="init()">
  <div class="Huiform">
    <form ng-submit="editmember()" method="post">
      <table class="table table-bg">
        <tbody>
          <input type="hidden" id="id" value="{{$member_data->id}}"></td>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.member_id')</th>
            <td><input type="text" style="width:300px" class="input-text" id="identify" value="{{$member_data->identify}}" required></td>
          </tr>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.member_name')</th>
            <td><input type="text" style="width:300px" class="input-text" id="member_name" value="{{$member_data->member_name}}" required></td>
          </tr>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.email')</th>
            <td><input type="email" style="width:300px" class="input-text" id="email" value="{{$member_data->email}}" required></td>
          </tr>                
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('membertable.expired_date')</th>
            <td>
            <input id="input_expired" type="hidden" value="{{$member_data->expired_date}}" />
            <md-datepicker id="expired_date" ng-model="expired_date"  md-placeholder="@lang('membertable.expired_date')" value="{{$member_data->expired_date}}"></md-datepicker>
          </tr>                             
          <tr>
            <th width="150" class="text-r"><span class="c-red">*</span> @lang('membertable.enabled')</th>
            <td>
              <input type='checkbox' value="1" id='enabled' ng-model="ischeck" ng-init="ischeck=true" ng-checked="{{$member_data->enabled}}">
              <input type='checkbox' value="0" id='enabled' ng-checked="!ischeck" style="display:none">
            </td>
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

