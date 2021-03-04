@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>اضافه مندوب   </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form method="POST" action="{{ url('admin/orders/'.$orders->order_id .'/'.$orders->user_id . '/mandob') }}" enctype="multipart/form-data" orders-parsley-validate="" class="form-horizontal form-label-left" >
        
        {{-- <input name="_method" type="hidden" value="PUT"> --}}
            {{ csrf_field() }}
      
               
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mandob_id">اسم المندوب 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select  class="form-control" name="mandob_id">
                    <option value="">---</option>
                    @foreach ($mandobs as $mandob)
                        <option value="{{ $mandob->id }}" {{ ($mandob->id == $orders->mandob_id)?"selected":"" }}>{{ $mandob->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="button"><a href="{{url('/')}}/admin/orders" style="color:white">إلغاء</a></button>
                  <button class="btn btn-primary" type="reset">ارسال</button>
                  <button type="submit" class="btn btn-success">تعديل</button>
                
                </div>
              </div>
              
              </form>
                  </div>
                </div>
              </div>
              </div>


@endsection
