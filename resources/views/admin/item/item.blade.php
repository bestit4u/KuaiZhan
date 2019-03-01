@extends('admin.layouts.linkapp')
@section('controller','itemCtrl')
@section('category', 'Betting Management')
@section('subcategory', 'Betting Items')
@section('control_buttons')
    <span class="l">
        <a href="/admin/item" class="btn btn-success radius"><i class="icon-reply-all"></i> @lang('content.showAll')</a>
        <a href="javascript:;" ng-click="dbmanage.deleteAll($event,'/admin/item/deleteAllItem', true)" class="btn btn-danger radius"><i class="icon-trash"></i> @lang('content.delAll')</a>
        <a class="btn btn-primary radius" ng-click="dbmanage.add($event,'/admin/item/addItem')" href="javascript:;"><i class="icon-plus"></i> @lang('content.add')</a>
    </span> 
@endsection
@section('link_table')
<table class="table table-border table-bordered table-hover table-bg table-sort">
      <thead>
      <tr class="text-c">
          <th width="25"><input type="checkbox" ng-click="dbmanage.selectAll()" id="selectAll"></th>
          <th width="30" class="sorting">@lang('itemtable.id')</th>
          <th width="80" class="sorting">@lang('itemtable.League')</th>
          <th width="200" class="sorting">@lang('itemtable.EventTitle')</th>
          <th width="50" class="sorting">@lang('itemtable.strBetType')</th>
          <th width="50" class="sorting">@lang('itemtable.Outcome')</th>            
          <th width="30" class="sorting">@lang('itemtable.Goals')</th>
          <th width="30" class="sorting">@lang('itemtable.Hcap')</th>
          <th width="30" class="sorting">@lang('itemtable.Model')</th>
          <th width="30" class="sorting">@lang('itemtable.Back')</th>
          <!-- <th width="30" class="sorting">@lang('itemtable.Lay')</th> -->
          <th width="30" class="sorting">@lang('itemtable.Value')</th>
          <th width="60" class="sorting">@lang('itemtable.MatchDate')</th>
          <th width="60" class="sorting">@lang('itemtable.StrataDate')</th>
          <th width="60" class="sorting">@lang('content.edit')</th>		
      </thead>
      <tbody>    
      @foreach($items as $key => $item)          
      <tr class="text-c">
          <td><input type="checkbox" value="{{$item->id}}" name="id[]"></td>
          <td>{{$key + 1}}</td>       
          <td>{{$item->League}}</td>
          <td>{{$item->EventTitle}}</td>
          <td>{{$item->strBetType}}</td> 
          <td>{{$item->Outcome}}</td>
          <td>{{$item->Goals}}</td>
          <td>{{$item->Hcap}}</td>
          <td>{{$item->Model}}</td>
          <td>{{$item->Back}}</td>
          <!-- <td>{{$item->Lay}}</td> -->
          <td>{{$item->Value}}</td>
          <td>{{Carbon\Carbon::parse($item->MatchDate)->format('Y-m-d H:i')}}</td>
          <td>{{Carbon\Carbon::parse($item->StrataDate)->format('Y-m-d H:i:s')}}</td>
          <td class="f-14 user-manage">
          <a style="text-decoration:none" class="ml-5" href="javascript:void(0);" title="@lang('content.edit')" ng-click="dbmanage.edit($event, '/admin/item/editItem?id={{$item->id}}')"><i class="icon-edit"></i></a> 
          <a title="@lang('content.del')" href="javascript:;" ng-click="dbmanage.delete($event, '/admin/item/deleteItem',{{$item->id}})" class="ml-5" style="text-decoration:none"><i class="icon-trash"></i></a>
      </tr>
      @endforeach    
      </tbody>    
  </table>    
@endsection
@section('js')
<script src="{{ asset('js/linkitem.controller.js') }}"></script>
@endsection