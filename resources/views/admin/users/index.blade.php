@extends('layouts.main')
@section('content')


<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
        
          <h2>  المستخدمين </h2>
          
          <div class="clearfix"></div>
        </div>
        
        <div class="x_content">
        
          <table class="table table-striped">
            <thead  class="thead-light">
              <tr>
              <th>#</th>
              <th>اسم المستخدم</th>
              <th> البريد الالكتروني</th>
              <th> رقم التليفون</th>
              <th>  تفعيل المستخدم</th>
              <th >التحكم</th>
              <th>  بلوك المستخدم</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($users as $i=>$user)
              
            <tr>  
                <th scope="row">{{++$i}}</th> 
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['id'] }}</td>
               
                
              <td>
                <form method="get" action="{{ url('admin/users/status/'.$user['id']) }}"  >
                  {{ csrf_field() }}

                  @if($user->status != 1)

                  <button type="submit" onclick="return confirm('هل انت متأكد من تفعيل المستخدم؟')" class="btn btn-success">
                   <i class="fa fa-check-circle"></i>
                  
                  </button>
                  @endif
              </form>
              </td>
              
                <td>

                <a href="{{url('admin/users/'.$user['id'])}}" class="btn btn-success" >
                  <i class="fa fa-eye"></i>
                </a>

                <form method="POST" onclick="return confirm('Are you sure?')" action="{{ url('admin/users/'.$user['id']) }}"  style="display:inline" >
                <button name="_method" type="hidden" value="DELETE" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-remove"></span>
                </button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        
               </td>
               <td>
                <form method="get" action="{{ url('admin/users/block/'.$user['id']) }}"  >
                  {{ csrf_field() }}

                  @if($user->status != 2)
                  <button type="submit" onclick="return confirm('هل تريد عمل بلوك للمستخدم؟')" style="background: #ec0f0f" class="btn btn-denger">
                   <i class="fa fa-remove" style="color: #fff"></i>
                  
                  </button>
                  @endif
              </form>
              </td>
              </tr>
        
          @endforeach
            
            </tbody>
          </table>
        
          {{ $users->links() }}
        </div>
        </div>
        </div>


@endsection
