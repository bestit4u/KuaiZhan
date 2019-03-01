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
        <strong>중개사무소 정보</strong>
    </div>
</div>
<table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
    <tr class="text-c">
        <th width="90" class="sorting">@lang('officetable.office_name')</th>
        <th width="60" class="sorting">@lang('officetable.leader_name')</th>
        <th width="200" class="sorting">@lang('officetable.office_tele')</th>
        <th width="200" class="sorting">@lang('membertable.phone')</th>			
        <th width="60" class="sorting">@lang('officetable.created_at')</th>	
        <th width="60" class="sorting">@lang('officetable.address')</th>	
    </thead>
    <tbody>    
    <tr class="text-c">
        <td>{{ $office_info->office_name }}</td>
        <td>{{ $office_info->member_name }}</td>
        <td>{{ $office_info->office_tele }}</td>
        <td>{{ $office_info->phone }}</td>
        <td>{{ $office_info->created_at->format('Y-m-d') }}</td>
        <td>{{ $office_info->address }}</td>
    </tr>
    </tbody>    
</table> 
<div style="overflow:hidden;padding-top:10px;padding-bottom:10px">
    <div class="col-md-5">
        <strong>회원 정보</strong>
    </div>
</div>
<div class="cl pd-5 bg-1 bk-gray ">
    <span class="r">@lang('content.total') <strong>{{$items->total()}}</strong> @lang('content.count')</span>
</div>
@endsection
@section('link_table')
<table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
      <tr class="text-c">
        <th width="50" class="sorting">@lang('membertable.id')</th>
        <th width="70" class="sorting">@lang('membertable.member_id')</th>		
        <th width="90" class="sorting">@lang('membertable.member_name')</th>
        <th width="60" class="sorting">@lang('membertable.phone')</th>
        <th width="60" class="sorting">@lang('membertable.position')</th>	
        <th width="60" class="sorting">@lang('officetable.created_at')</th>	
    </thead>
    <tbody>    
    @foreach($items as $key => $item)          
      <tr class="text-c">
        <td>{{$key + 1}}</td>       
        <td>{{ $item->identify }}</td>
        <td>{{ $item->member_name }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ $item->position }}</td>
        <td>{{ $item->created_at->format('Y-m-d') }}</td>
        
        <!-- <td class="f-14 user-manage">
          <a style="text-decoration:none" class="ml-5" href="javascript:void(0);" title="@lang('content.edit')" ng-click="dbmanage.edit($event, 'office/editOffice?id={{$item->id}}')"><i class="icon-edit"></i></a> 
          <a title="@lang('content.del')" href="javascript:;" ng-click="dbmanage.delete($event, 'office/deleteOffice',{{$item->id}})" class="ml-5" style="text-decoration:none"><i class="icon-trash"></i></a>
        </td> -->
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