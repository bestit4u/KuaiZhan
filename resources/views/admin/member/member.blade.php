@extends('admin.layouts.linkapp')
@section('controller','memberCtrl')
@section('category', 'Member Management')
@section('subcategory', 'Member')
@section('control_buttons')
    <span class="l">
        <a href="/admin/member" class="btn btn-success radius"><i class="icon-reply-all"></i> @lang('content.showAll')</a>
        <a href="javascript:;" ng-click="dbmanage.deleteAll($event,'/admin/member/deleteAllMember', true)" class="btn btn-danger radius"><i class="icon-trash"></i> @lang('content.delAll')</a>
        <a class="btn btn-primary radius" ng-click="dbmanage.add($event,'/admin/member/addMember')" href="javascript:;"><i class="icon-plus"></i> @lang('content.add')</a>
    </span> 
@endsection
@section('link_table')
<table class="table table-border table-bordered table-hover table-bg table-sort">
      <thead>
      <tr class="text-c">
          <th width="25"><input type="checkbox" ng-click="dbmanage.selectAll()" id="selectAll"></th>
          <th width="30" class="sorting">@lang('membertable.id')</th>
          <th width="70" class="sorting">@lang('membertable.member_id')</th>
          <th width="70" class="sorting">@lang('membertable.member_name')</th>
          <th width="80" class="sorting">@lang('membertable.email')</th>           
          <th width="100" class="sorting">@lang('membertable.expired_date')</th>
          <th width="80" class="sorting">@lang('membertable.enabled')</th>
          <th width="120" class="sorting">@lang('membertable.created_at')</th>
          <th width="120" class="sorting">@lang('content.edit')</th>		
      </thead>
      <tbody>    
      @foreach($items as $key => $item)          
      <tr class="text-c">
          <td><input type="checkbox" value="{{$item->id}}" name="id[]"></td>
          <td>{{$key + 1}}</td>       
          <td>{{$item->identify}}</td>
          <td>{{$item->member_name}}</td>
          <td>{{$item->email}}</td> 
          <td>{{Carbon\Carbon::parse($item->expired_date)->format('Y-m-d')}}</td>
          <td>
            @if($item->enabled)
            <span class="label label-success">@lang('content.enabled')</span>
            @else
            <span class="label label-label">@lang('content.disabled')</span>
            @endif  
          </td>    
          <td>{{$item->created_at->format('Y-m-d')}}</td>      
          <td class="f-14 user-manage">
          <a style="text-decoration:none" class="ml-5" href="javascript:void(0);" title="@lang('content.edit')" ng-click="dbmanage.edit($event, '/admin/member/editMember?id={{$item->id}}')"><i class="icon-edit"></i></a> 
          <a title="@lang('content.del')" href="javascript:;" ng-click="dbmanage.delete($event, '/admin/member/deleteMember',{{$item->id}})" class="ml-5" style="text-decoration:none"><i class="icon-trash"></i></a>
          <a title="@lang('membertable.changepass')" href="javascript:;" ng-click="dbmanage.changePass($event, '/admin/member/changePassword?id={{$item->id}}')" class="ml-5" style="text-decoration:none"><i class="icon-key"></i></a></td>
      </tr>
      @endforeach    
      </tbody>    
  </table>    
@endsection
@section('js')
<script src="{{ asset('js/linkmember.controller.js') }}"></script>
@endsection