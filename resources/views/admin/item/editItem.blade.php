<md-toolbar style="min-height:40px;" class="btn btn-primary radius">
  <div class="md-toolbar-tools" style="height:40px;">
    <h2>@lang('itemtable.tb_name') @lang('content.edit')</h2>
    <span flex></span>
    <md-button class="md-icon-button" ng-click="cancel()">
      <md-icon md-svg-src="/images/ic_close_white_24px.svg" aria-label="Close dialog"></md-icon>
    </md-button>
  </div>
</md-toolbar>
<div class="pd-20" ng-controller="itemCtrl">
  <div class="Huiform">
    <form ng-submit="manageitem('edit')" method="post">
      <table class="table table-bg">
        <tbody>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.League')</th>
            <td><input id="League" type="text" style="width:200px" class="input-text" value="{{$item_data->League}}" required></td>
          </tr>
          <tr>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.Home')</th>
            <td><input id="Home" type="text" style="width:200px" class="input-text" value="{{$item_data->Home}}" required></td>
          </tr>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.Away')</th>
            <td><input id="Away" style="width:200px" class="input-text" value="{{$item_data->Away}}" required></td>
          </tr>   
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.strBetType')</th>
            <td><select type="text" style="width:200px" class="input-text" ng-model="BetType" ng-change="ChangeType()" ng-options="x.id as x.name for x in bettype_list"></select></td>
          </tr>                
          <tr id="sidetypes" style="display:none">
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.SideType')</th>
            <td><select type="text" style="width:200px" class="input-text" ng-model="SideType" ng-options="x.id as x.name for x in outype_list"></select></td>
          </tr>     
          <tr id="teamtypes" style="display:none">
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.TeamType')</th>
            <td><select type="text" style="width:200px" class="input-text" ng-model="TeamType" ng-options="x.id as x.name for x in teamtype_list"></select></td>
          </tr>  
          <tr id="goaltag" style="display:none">
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.Goals')</th>
            <td><input id="Goals" style="width:200px" class="input-text" value="{{$item_data->Goals}}" ></td>
          </tr> 
          <tr id="handicaptag" style="display:none">
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.Hcap')</th>
            <td><input id="Hcap" style="width:200px" class="input-text" value="{{$item_data->Hcap}}" ></td>
          </tr>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.Model')</th>
            <td><input id="Model" style="width:200px" class="input-text" value="{{$item_data->Model}}" required></td>
          </tr>
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.Back')</th>
            <td><input id="Back" style="width:200px" class="input-text" value="{{$item_data->Back}}" required></td>
          </tr>  
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.Lay')</th>
            <td><input id="Lay" style="width:200px" class="input-text" value="{{$item_data->Lay}}" required></td>
          </tr>  
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.Value')</th>
            <td><input id="Value" style="width:200px" class="input-text" value="{{$item_data->Value}}" required></td>
          </tr>     
          <tr>
            <th width="165" class="text-r"><span class="c-red">*</span> @lang('itemtable.MatchDate')</th>
            <td>              
            <input id="MatchDate" style="width:200px" class="input-text" value="{{ \Carbon\Carbon::parse($item_data->MatchDate)->format('Y-m-d H:i')}}" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}">
            <span>(2018-04-11 02:45)</span>
            </td>
          </tr>   
          <tr>
            <th></th>
            <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> @lang('content.edit')</button></td>
          </tr>
          <input id="id" value="{{$item_data->id}}" style="display:none">
          <input id="BetType" value="{{$item_data->BetType}}" style="display:none">
          <input id="SideType" value="{{$item_data->SideType}}" style="display:none">
          <input id="TeamType" value="{{$item_data->TeamType}}" style="display:none">
        </tbody>
      </table>
    </form>
  </div>
</div>