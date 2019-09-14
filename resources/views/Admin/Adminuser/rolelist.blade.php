@extends('Admin.AdminPublic.adminpublic')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="container"> 
   <div class="container"> 
    <div class="mws-panel-body no-padding"> 
     <form class="mws-form" action="/adminsaverole" method="post"> 
      <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">角色信息</label> 
        <div class="mws-form-item clearfix"> 
        <h4>当前用户:  {{$info->name}}的角色信息</h4> 
         <ul class="mws-form-list inline">
          @foreach ($role as $row)
              <li><input type="checkbox" name="rid"  value="{{$row->id}}" @if(in_array($row->id,$data))checked @endif/> <label>{{$row->name}}</label></li>
          @endforeach
         </ul> 
        </div> 
       </div> 
      </div> 
      <div class="mws-button-row">
        {{csrf_field()}}
        <input type="hidden" name="uid" value="{{$info->id}}">
       <input value="分配角色" class="btn btn-danger" type="submit" /> 
       <input value="Reset" class="btn " type="reset" /> 
      </div> 
     </form> 
    </div> 
    <!-- Panels End --> 
   </div> 
   <!-- Panels End --> 
  </div>
 </body>
</html>
@endsection
@section('title','后台角色分配')