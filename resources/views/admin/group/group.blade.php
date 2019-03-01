@extends('admin.layouts.linkapp')
@section('controller','groupCtrl')
@section('category', '모임관리')
@section('subcategory', '모임')
@section('control_buttons')
    <span class="l">
        @if (Auth::user()->member_type != 0)
        <a href="/admin/group" class="btn btn-success radius"><i class="icon-reply-all"></i> @lang('content.showAll')</a>
        <a href="javascript:;" ng-click="dbmanage.deleteAll($event,'/admin/group/deleteAllGroup', true)" class="btn btn-danger radius"><i class="icon-trash"></i> @lang('content.delAll')</a>
        @endif
        @if (Auth::user()->member_type == 2 || Auth::user()->group_id == null)
            <a class="btn btn-primary radius" ng-click="dbmanage.add($event,'/admin/group/addGroup')" href="javascript:;"><i class="icon-plus"></i> @lang('content.add')</a>
        @endif
    </span> 
@endsection
@section('link_table')
<table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
    <tr class="text-c">
        <th width="25"><input type="checkbox" ng-click="dbmanage.selectAll()" id="selectAll"></th>
        <th width="50" class="sorting">@lang('grouptable.id')</th>
        <th width="60" class="sorting">@lang('grouptable.name')</th>
        <th width="1500" class="sorting">@lang('grouptable.content')</th>
        <th width="60" class="sorting">@lang('grouptable.create_at')</th>
        @if (Auth::user()->member_type != 0)		
            <th width="40" class="sorting">@lang('content.edit')</th>		
        @endif
    
    </thead>
    <tbody>    
    @foreach($items as $key => $item)          
    <tr class="text-c">
        <td><input type="checkbox" value="{{$item->id}}" name="id[]"></td>
        <td>{{$key + 1}}</td>       
        <td>{{$item->group_name}}</td>
        <td>{{ $item->content }}</td>
        <td>{{ $item->created_at->format('Y-m-d') }}</td>
        @if (Auth::user()->member_type != 0)
        <td class="f-14 user-manage">
            <a style="text-decoration:none" class="ml-5" href="/admin/group/adminInfo?id={{$item->id}}" title="@lang('content.adminInfo')"><i class="icon-cog"></i></a> 
            <a style="text-decoration:none" class="ml-5" href="/admin/group/officeInfo?id={{$item->id}}" title="@lang('content.officeInfo')"><i class="icon-building"></i></a> 
            <a style="text-decoration:none" class="ml-5" href="/admin/danji?id={{$item->id}}" title="@lang('content.danjiInfo')"><i class="icon-road"></i></a> 
            <a style="text-decoration:none" class="ml-5" href="javascript:void(0);" title="@lang('content.edit')" ng-click="dbmanage.edit($event, '/admin/group/editGroup?id={{$item->id}}')"><i class="icon-edit"></i></a> 
            <a title="@lang('content.del')" href="javascript:;" ng-click="dbmanage.delete($event, '/admin/group/deleteGroup',{{$item->id}})" class="ml-5" style="text-decoration:none"><i class="icon-trash"></i></a>
        </td>
        @endif
    </tr>
    @endforeach    
    </tbody>    
</table>    
@endsection
@section('js')
<script src="{{ asset('js/linkgroup.controller.js') }}"></script>
@endsection