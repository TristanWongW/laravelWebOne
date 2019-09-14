@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/admins/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>管理员列表</span> 
   </div> 
   <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">管理ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">管理名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 191px;">密码</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach ($list as $item)
            
        <tr class="odd"> 
            <td class="  sorting_1">{{$item->id}}</td> 
            <td class=" ">{{$item->name}}</td> 
            <td class=" ">{{$item->password}}</td> 
        <td class=" ">
          </a><a href="/adminrolelist/{{$item->id}}" class="btn btn-danger">分配角色</a>
          <a href="javascript:void(0)" class="btn btn-success del" name="{{$item->id}}">删除</a>
        <a href="/adminuser/{{$item->id}}}/edit" class="btn btn-info">修改</td> 
        </tr>
        @endforeach
    
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      测试教学
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
      {!!$list->appends($request)->render()!!}
     </div>
    </div> 
   </div> 
  </div>
<script>
  //获取删除按钮 绑定单击事件
  $('.del').click(function(){
    var th = $(this);
    //获取id
    var id = $(this).attr('name');
    // alert(id);
    $.get('/admindelete',{id:id},function(data){
      // alert(data);
      if (data == 1) {
        alert('删除成功');
        //删除tr页面
        th.parents("tr").remove();
      }
    });
  });
</script>
 </body>
</html>
@endsection
@section('title','管理员列表')