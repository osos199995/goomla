@extends('layouts.main')
@section('content')


      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> اضافه  فئه فرعية</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                
                </ul>
              <div class="clearfix"></div>
          </div>
      <div class="x_content">
        <br>
        <form method="POST" action="{{ Route('subcategories.store') }}" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

          {{ csrf_field() }}

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">اسم الفئه
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select  class="form-control" name="category_id" required>
                <option value="">---</option>
                @foreach ($categories as $category)
                

                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_id">اسم الشركه
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control"  name="company[]" multiple>
                <option value="">---</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
            </div>
          </div>




        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> اسم الفئه الفرعية <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="text"  name="name" id="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12" required>
          </div>
        </div>
        
        

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" >صورة</label>
          <div class="input-group" >
          <div class="col-md-6 col-sm-6 col-xs-12" >
              <input type="file" name="image" id="image" class="form-control" > </div>
          </div>
      </div>

        <div class="ln_solid"></div>
         <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-primary" type="button"><a href="{{url('/')}}/admin/subcategories" style="color:white">إلغاء</a></button>
            <button class="btn btn-primary" type="reset">إعاده</button>
            <button type="submit" class="btn btn-success">اضافه</button>
          </div>
        </div>

          </form>
        </div>
      </div>
        </div>
      </div>
<script type="text/javascript">
  $(document).ready(function() {
      $('select').selectpicker();
  });
</script>
@endsection
