@extends("Admin.AdminPublic.adminpublic")
@section("admin")
  <div class="mws-panel grid_8">
                  <div class="mws-panel-header">
                      <span>分类添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                      <form class="mws-form" action="/admincategory" method="POST">
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
                            <label class="mws-form-label">分类名</label>
                            <div class="mws-form-item">
                              <input type="text" class="small" name="name">
                            </div>
                          </div>
                          
                          <div class="mws-form-row">
                            <label class="mws-form-label">父类</label>
                            <div class="mws-form-item">
                              <select class="small" name="pid">
                                <option value="0">--请选择--</option>
                                @foreach($category as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                              </select>
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
@section("title","分类添加")