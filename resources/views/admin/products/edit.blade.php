@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>تعديل المنتج</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form method="POST" action="{{ url('admin/products/'.$products->id) }}" enctype="multipart/form-data" categories-parsley-validate="" class="form-horizontal form-label-left" >
        
        <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">اسم المخزن
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" required id="exampleFormControlSelect1" class="form-control col-md-6 col-xs-12" name="store_id">
                  <option value="">---</option>
                  
                  @foreach ($stores as $store)
                    <option value="{{$store->id}}" {{ ($store->id == $products->store_id)?"selected":"" }}>{{$store->name}}</option>
                  @endforeach 
     
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">اسم الفئه
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" required id="exampleFormControlSelect1" class="form-control col-md-6 col-xs-12" name="category_id">
                  <option value="">---</option>
                  
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ ($category->id == $products->category_id)?"selected":"" }}>{{$category->name}}</option>
                  @endforeach 
     
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">اسم الفئه الفرعية
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" required id="exampleFormControlSelect1" class="form-control col-md-6 col-xs-12" name="subcategory_id">
                  <option value="">---</option>
                  
                  @foreach ($subcategories as $category)
                    <option value="{{$category->id}}" {{ ($category->id == $products->subcategory_id)?"selected":"" }}>{{$category->name}}</option>
                  @endforeach 
     
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">اسم الشركة
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="exampleFormControlSelect1" class="form-control col-md-6 col-xs-12" name="company_id">
                  <option value="">---</option>
                  
                  @foreach ($companies as $company)
                    <option value="{{$company->id}}" {{ ($company->id == $products->company_id)?"selected":"" }}>{{$company->name}}</option>
                  @endforeach 
     
                </select>
              </div>
            </div>
             

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> اسم المنتج  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text"  name="name" id="name" value="{{$products->name}}" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> نوع الوحدة
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text"  name="unit_type" id="unit_type" value="{{$products->unit_type}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> نوع القطعه الواحده
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text"  name="subunit_type" id="subunit_type" value="{{$products->subunit_type}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity_unit"> كمية الوحده
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="number"  name="quantity_unit" id="quantity_unit" value="{{$products->quantity_unit}}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> كمية المنتج   <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="number"  name="quantity" id="quantity" value="{{ $products->quantity }}" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price"> سعر القطعه الواحده  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="number"  name="price_unit" id="price_unit" value="{{ $products->price_unit }}" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> سعر المنتج قبل الخصم 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="number"  name="discount" id="discount" value="{{ $products->discount }}" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price"> سعر المنتج بعد الخصم <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="number"  name="price" id="price" value="{{ $products->price }}" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                      
                     
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"> تفاصيل    <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="description" id="description" class="form-control col-md-7 col-xs-12" >{{ $products->description }}</textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title" requied>تفعيل المنتج ؟
                        </label>
                        @if($products->status == 1)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="radio" name="status" value="1" checked> نعم<br>
                            <input type="radio" name="status" value="0"> لا<br>
                        </div>
                        @elseif($products->status == 0)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="status" value="1" > نعم<br>
                          <input type="radio" name="status" value="0" checked> لا<br>
                      </div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title" requied>تحديد كميه للمنتج ؟ 
                      </label>
                      @if($products->quantity_status == 1)
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="quantity_status" value="1" checked> نعم<br>
                          <input type="radio" name="quantity_status" value="0"> لا<br>
                      </div>
                      @elseif($products->quantity_status == 0)
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="radio" name="quantity_status" value="1" > نعم<br>
                        <input type="radio" name="quantity_status" value="0" checked> لا<br>
                    </div>
                    @endif
                  </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title" requied> وضع المنتج في قائمه الانتظار
                        </label>
                        @if($products->waiting_status == 1)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="radio" name="waiting_status" value="1" checked> نعم<br>
                            <input type="radio" name="waiting_status" value="0"> لا<br>
                        </div>
                        @elseif($products->waiting_status == 0)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="waiting_status" value="1" > نعم<br>
                          <input type="radio" name="waiting_status" value="0" checked> لا<br>
                      </div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> الحد الاقصي للكميه   <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input  type="number"  name="max_quantity" id="max_quantity" value="{{ $products->max_quantity }}" class="form-control col-md-7 col-xs-12" required>
                      </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >صورة</label>
                        <div class="input-group" >
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" name="image" id="images" class="form-control" >
                             </div>
                             <img src="{{asset('uploads/products/'.$products->image)}}"  alt="Image" style="width:50px;height:50px;margin-left:320px;">  

                          </div>
                        </div>
                     
    
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="button"><a href="{{url('/')}}/admin/products" style="color:white">إلغاء</a></button>
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
