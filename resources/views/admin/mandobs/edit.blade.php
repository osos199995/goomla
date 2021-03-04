@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>تعديل المندوب</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form method="POST" action="{{ url('admin/mandobs/'.$mandobs->id) }}" enctype="multipart/form-data" categories-parsley-validate="" class="form-horizontal form-label-left" >
        
        <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_price">   اسم المندوب  
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text"  name="name" id="name" value="{{$mandobs->name}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_price">   منطقه المندوب  
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text"  name="section" id="section" value="{{$mandobs->section}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_price">   رقم تليفون المندوب  
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="number"  name="phone" id="phone" value="{{$mandobs->phone}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_price">   عنوان المندوب  
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text"  name="address" id="address" value="{{$mandobs->address}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                     
    
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="button"><a href="{{url('/')}}/admin/mandobs" style="color:white">إلغاء</a></button>
                  <button class="btn btn-primary" type="reset">إعاده</button>
                  <button type="submit" class="btn btn-success">تعديل</button>
                
                </div>
              </div>
              
              </form>
                  </div>
                </div>
              </div>
              </div>


@endsection
