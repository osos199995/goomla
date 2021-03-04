@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>تعديل المخزن</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form method="POST" action="{{ url('admin/stores/'.$stores->id) }}" enctype="multipart/form-data" categories-parsley-validate="" class="form-horizontal form-label-left" >

        <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_price">   اسم المخزن
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text"  name="name" id="name" value="{{$stores->name}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">منطقة المخزن
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" required id="exampleFormControlSelect1" class="form-control col-md-6 col-xs-12" name="area_id">
                        <option value="">---</option>

                        @foreach ($areas as $area)
                            <option value="{{$area->id}}"
                                {{ ($area->id == $stores->section)?"selected":"" }}
                            >{{$area->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_price">   عنوان المخزن
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text"  name="address" id="address" value="{{$stores->address}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="button"><a href="{{url('/')}}/admin/stores" style="color:white">إلغاء</a></button>
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
