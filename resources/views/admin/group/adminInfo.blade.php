@extends('admin.layouts.infotemplete')
@section('controller','memberCtrl')
@section('category', '모임관리')
@section('subcategory', '관리자정보')
@section('information_tag')
<div style="overflow:hidden;padding-top:10px;padding-bottom:10px">
<div class="col-md-1">
    <strong>모임정보</strong>
</div>

</div>
<table class="table table-border table-bordered table-hover table-bg table-sort">
<thead>
<tr class="text-c">
    <th width="60" class="sorting">@lang('grouptable.name')</th>
    <th width="1000" class="sorting">@lang('grouptable.content')</th>
    <th width="60" class="sorting">@lang('grouptable.create_at')</th>
</thead>
<tbody>    
<tr class="text-c">
    <td>{{ $group_info->group_name}}</td>
    <td>{{ $group_info->content }}</td>
    <td>{{ $group_info->created_at->format('Y-m-d') }}</td>
</tr>
</tbody>    
</table>    
<div style="overflow:hidden;padding-top:10px;padding-bottom:10px">
<div class="col-md-5">
    <strong>관리자 정보</strong>
</div>
</div>
@endsection
@section('link_table')

<table class="table table-border table-bordered table-hover table-bg table-sort">
      <thead>
      <tr class="text-c">
          <th width="30" class="sorting">@lang('membertable.id')</th>
          <th width="70" class="sorting">@lang('membertable.member_id')</th>
          <th width="70" class="sorting">@lang('membertable.member_name')</th>
          <th width="80" class="sorting">@lang('membertable.phone')</th>
          <th width="80" class="sorting">@lang('officetable.office_name')</th>          
          <th width="80" class="sorting">@lang('officetable.office_tele')</th>          
          <th width="120" class="sorting">@lang('membertable.address')</th>
          <th width="100" class="sorting">@lang('membertable.position')</th>
          <th width="120" class="sorting">@lang('membertable.member_type')</th>
          <th width="80" class="sorting">@lang('membertable.enabled')</th>
          <th width="120" class="sorting">@lang('membertable.created_at')</th>
          <th width="120" class="sorting">@lang('content.edit')</th>		
      </thead>
      <tbody>    
      @foreach($items as $key => $item)          
      <tr class="text-c">
          <td>{{$key + 1}}</td>       
          <td>{{$item->identify}}</td>
          <td>{{$item->member_name}}</td>
          <td>{{$item->phone}}</td>
          <td>{{$item->office_name}}</td>
          <td>{{$item->office_tele}}</td>
          <td>{{$item->address}}</td>
          <td>{{$item->position}}</td>          
          <td>@lang('content.admin')</td>
          <td>
            @if($item->enabled)
            <span class="label label-success">@lang('content.enabled')</span>
            @else
            <span class="label label-label">@lang('content.disabled')</span>
            @endif  
          </td>    
          <td>{{$item->created_at->format('Y-m-d')}}</td>      
          <td class="f-14 user-manage">
          <a style="text-decoration:none" class="ml-5" href="javascript:void(0);" title="@lang('grouptable.toNormalUser')" ng-click="dbmanage.toNormalUser($event, '/admin/group/toNormalUser','{{$item->id}}')"><i class="icon-caret-down"></i></a> 
      </tr>
      @endforeach    
      </tbody>    
  </table>    
@endsection
@section('js')
<script src="{{ asset('js/linkmember.controller.js') }}"></script>
@endsection
<script>
    var toNormalUserMessage =  "@lang('content.toNormalUserMessage')";
</script>