@extends("Admin.AdminPublic.adminpublic")
@section("admin")
  <div class="mws-panel grid_8">
                  <div class="mws-panel-header">
                      <span>用户修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    <form class="mws-form" action="/adminuser/{{$info->id}}" method="POST">
                      
                        <div class="mws-form-inline">
                          <div class="mws-form-row">
                            <label class="mws-form-label">用户名</label>
                            <div class="mws-form-item">
                            <input type="text" class="small" name="name" value="{{$info->name}}">
                            </div>
                          </div>
                          <div class="mws-form-row">
                            <label class="mws-form-label">密码</label>
                            <div class="mws-form-item">
                              <input type="password" class="small" name="password">
                            </div>
                          </div>
                          
                        </div>
                        <div class="mws-button-row">
                          {{csrf_field()}} 
                          {{-- CSRF跨站点请求伪造(Cross—Site Request Forgery) --}}
                          {{method_field('PUT')}}
                          <input type="submit" value="修改" class="btn btn-danger">
                          <input type="重置" value="Reset" class="btn btn-success">
                        </div>
                      </form>
                    </div>      
                </div>
@endsection
@section("title","会员修改")