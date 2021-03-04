@extends('layouts.main')
@section('content')


<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
        
          <h2>  شكاوي المنتج</h2>
         
          <div class="clearfix"></div>
        </div>
        
        <div class="x_content">
        
          <table class="table table-striped">
            <thead  class="thead-light">
              <tr>
              <th>#</th>
              <th>اسم اليوزر</th>
              <th>  اسم المنتج  </th>
              <th>الشكوي  </th>
              
              <th width="15%">التحكم</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($complaintsproducts as $i=>$complaint)
              
            <tr>  
                <th scope="row">{{++$i}}</th> 
                <td>{{ $complaint->user->name }}</td>
                <td>{{ $complaint->product->name }}</td>
                <td>{{ $complaint->comment }}</td>
               
                
              
                <td>
                

                 <form method="POST" onclick="return confirm('Are you sure?')" action="{{ url('admin/complaintsproducts/'.$complaint['id']) }}"  style="display:inline" >
                
                <button name="_method" type="hidden" value="DELETE" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-remove"></span>
                </button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        
               </td>
        
        
           
                 
              </tr>
        
          @endforeach
            
            </tbody>
          </table>
        
        </div>
        </div>
        </div>


@endsection
