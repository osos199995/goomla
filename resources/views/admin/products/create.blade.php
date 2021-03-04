@extends('layouts.main')
@section('content')


      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> اضافه  منتج </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                
                </ul>
              <div class="clearfix"></div>
          </div>
      <div class="x_content">
        <br>
        <form method="POST" action="{{ Route('products.store') }}" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left">

          {{ csrf_field() }}

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">اسم المخزن
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select  class="form-control" name="store_id" required>
                <option value="">---</option>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subcategory_id">اسم الفئه الفرعية
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select  class="form-control" name="subcategory_id" required>
                <option value="">---</option>
                @foreach ($subcategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_id">اسم الشركه
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select  class="form-control" name="company_id">
                <option value="">---</option>
                @foreach ($companies as $company)
                

                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> اسم المنتج  <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="text"  name="name" id="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> نوع الوحدة  
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="text"  name="unit_type" id="unit_type" value="{{old('unit_type')}}" class="form-control col-md-7 col-xs-12" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> نوع القطعه الواحده       
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="text"  name="subunit_type" id="subunit_type" value="{{old('subunit_type')}}" class="form-control col-md-7 col-xs-12" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> كميه الوحدة  
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="text"  name="quantity_unit" id="quantity_unit" value="{{old('quantity_unit')}}" class="form-control col-md-7 col-xs-12" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> كمية المنتج   <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="number"  name="quantity" id="quantity" value="{{old('quantity')}}" class="form-control col-md-7 col-xs-12" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price_unit"> سعر القطعه الواحده   <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="number"  name="price_unit" id="price_unit" value="{{old('price_unit')}}" class="form-control col-md-7 col-xs-12" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> سعر المنتج قبل الخصم   
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="number"  name="discount" id="discount" value="{{old('discount')}}" class="form-control col-md-7 col-xs-12" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">  سعر المنتج بعد الخصم  <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="number"  name="price" id="price" value="{{old('price')}}" class="form-control col-md-7 col-xs-12" required>
          </div>
        </div>
        
        
        
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"> تفاصيل    
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea  name="description" id="description"  class="form-control col-md-7 col-xs-12" >{{old('description')}}</textarea>
          </div>
        </div>
        <div class="row">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title" requied>تفعيل المنتج ؟</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="radio" name="status" value="1"> نعم<br>
          <input type="radio" name="status" value="0"> لا<br>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title" requied> وضع المنتج في قائمه الانتظار</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="radio" name="waiting_status" value="1"> نعم<br>
          <input type="radio" name="waiting_status" value="0"> لا<br>
          </div>
        </div>
      </div>
        
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title" requied> تحديد كميه للمنتج ؟</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="radio" name="quantity_status" value="1"> نعم<br>
          <input type="radio" name="quantity_status" value="0"> لا<br>
          </div>
        </div>

        

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> اقصي كميه متاحه    
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input  type="number"  name="max_quantity" id="max_quantity" value="{{old('max_quantity')}}" class="form-control col-md-7 col-xs-12" >
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
            <button class="btn btn-primary" type="button"><a href="{{url('/')}}/admin/products" style="color:white">إلغاء</a></button>
            <button class="btn btn-primary" type="reset">إعاده</button>
            <button type="submit" class="btn btn-success">اضافه</button>
          </div>
        </div>

          </form>
        </div>
      </div>
        </div>
      </div>

@endsection
