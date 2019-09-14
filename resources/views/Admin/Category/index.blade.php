@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>分类列表</span> 
   </div> 
   <div class="mws-panel-body no-padding">
    <form action="/admincategory" method="get">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
         
      <label>搜索: 分类名<input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}" /></label>
      <input type="submit" value="搜索">
     </div>
    </form>

     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">分类ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">分类名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 191px;">PID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 191px;">PATH</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach ($category as $item)
            
        <tr class="odd"> 
            <td class="  sorting_1">{{$item->id}}</td> 
            <td class=" ">{{$item->name}}</td> 
            <td class=" ">{{$item->pid}}</td> 
            <td class=" ">{{$item->path}}</td> 
            <td class=" ">
            <form action="/admincategory/{{$item->id}}" method="post">
            <button class="btn btn-danger">软删除</button>
            {{csrf_field()}}
            {{-- 伪造一个请求 --}}
            {{method_field("DELETE")}}
            </form>
        <a href="/admincategory/{{$item->id}}}/edit" class="btn btn-info">修改</a><a href="" class="btn btn-block">查看</a></td> 
        </tr>
        @endforeach
    
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      Showing 1 to 10 of 57 entries
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      {!!$category->appends($request)->render()!!}
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','分类列表')