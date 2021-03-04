@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>تعديل  السلايدر </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form method="POST" action="{{ url('admin/sliders/'.$sliders->id) }}" enctype="multipart/form-data" sliders-parsley-validate="" class="form-horizontal form-label-left" >

        <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">اسم الفئه
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" required id="exampleFormControlSelect1" class="form-control col-md-6 col-xs-12" name="package_id">
                  <option value="">---</option>

                  @foreach ($packages as $package)
                    <option value="{{$package->id}}"
                        {{ ($package->id == $sliders->package_id)?"selected":"" }}
                    >{{$package->name}}</option>
                  @endforeach

                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" >صوره السلايدر </label>
              <div class="input-group" >
              <div class="col-md-6 col-sm-6 col-xs-12" >
                  <input type="file" name="image"  value="{{ $sliders->image }}" id="_image" class="form-control"> </div>
              </div>
              @if($sliders->image ==null)
              @else
              <img src="{{asset('uploads/sliders/'.$sliders->image)}}"  alt="Image" style="width:50px;height:50px;margin-left:30px;">
              @endif
            </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="button"><a href="{{url('/')}}/admin/sliders" style="color:white">إلغاء</a></button>
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
