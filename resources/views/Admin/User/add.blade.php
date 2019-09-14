@extends("Admin.AdminPublic.adminpublic")
@section("admin")
  <div class="mws-panel grid_8">
                  <div class="mws-panel-header">
                      <span>用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                      <form class="mws-form" action="/adminuser" method="POST">
                      {{-- 显示错误信息 --}}
                        @if (count($errors) > 0)
                        <div class="mws-form-message error">
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif
                        <div class="mws-form-inline">
                          <div class="mws-form-row">
                            <label class="mws-form-label">用户名</label>
                            <div class="mws-form-item">
                              <input type="text" class="small" name="name">
                            </div>
                          </div>
                          <div class="mws-form-row">
                            <label class="mws-form-label">密码</label>
                            <div class="mws-form-item">
                              <input type="password" class="small" name="password">
                            </div>
                          </div>
                          <div class="mws-form-row">
                            <label class="mws-form-label">确认密码</label>
                            <div class="mws-form-item">
                              <input type="password" class="small" name="repassword">
                            </div>
                          </div>
                          
                        </div>
                        <div class="mws-button-row">
                          {{csrf_field()}} //CSRF跨站点请求伪造(Cross—Site Request Forgery)
                          <input type="submit" value="添加" class="btn btn-danger">
                          <input type="重置" value="Reset" class="btn btn-success">
                        </div>
                      </form>
                    </div>      
                </div>
@endsection
@section("title","会员添加")