<md-toolbar style="min-height:40px;" class="btn btn-primary radius">
  <div class="md-toolbar-tools" style="height:40px;">
    <h2>@lang('grouptable.tb_name')@lang('content.add')</h2>
    <span flex></span>
    <md-button class="md-icon-button" ng-click="cancel()">
      <md-icon md-svg-src="/images/ic_close_white_24px.svg" aria-label="Close dialog"></md-icon>
    </md-button>
  </div>
</md-toolbar>
<div class="pd-20" style="width:800px;height:800px">
  <div class="Huiform">
    <form action="/admin/group/addGroup" method="post">
      <table class="table table-bg">
        <tbody>
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> @lang('grouptable.name')</th>
            <td><input type="text" style="width:600px" class="input-text"  placeholder="@lang('')" name="group_name"></td>
          </tr>                
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> @lang('grouptable.content')</th>
            <td><textarea type="text" class="input-text" placeholder="@lang('')" name="content" style="width: 600px; height:500px;"></textarea></td>
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