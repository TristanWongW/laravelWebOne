@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>角色列表</span> 
   </div> 
   <div class="mws-panel-body no-padding">

     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">角色ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">角色名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach ($role as $item)
            
        <tr class="odd"> 
            <td class="  sorting_1">{{$item->id}}</td> 
            <td class=" ">{{$item->name}}</td> 
            <td class=" ">
              <a href="/adminauth/{{$item->id}}" class="btn btn-danger">分配权限</a>
              <a href="" class="btn btn-success">修改</a>

            <form action="/adminrole/{{$item->id}}" method="post">
            <button class="btn btn-danger">删除</button>
            {{csrf_field()}}
            {{-- 伪造一个请求 --}}
            {{method_field("DELETE")}}
            </form>
            </td> 
        </tr>
        @endforeach
    
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      Showing 1 to 10 of 57 entries
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','角色列表')