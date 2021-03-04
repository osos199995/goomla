@extends('layouts.main')

@section('content')



        <div class="page-title">
            <div class="title_left" style="float: right;direction: rtl;">
                <h3 >الصفحه الشخصيه</h3>
            </div>

            
        </div>

        <div class="clearfix"></div>

        <div class="row" style="direction: rtl">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                
                               
                            </li>
                            {{-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li> --}}
                        </ul>
                        {{-- <h2 style="float: right"></h2> --}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    @if($users->image)
                                    <img class="img-responsive avatar-view" src="{{url('/')}}/public/images/user1.png" alt="Avatar"
                                        title="Change the avatar" style="float:right;width: 250px;height: 250px;border-radius: 110px;">
                                    @else
                                    <img class="img-responsive avatar-view" src="{{url('/')}}/public/images/picture.jpg" alt="Avatar"
                                        title="Change the avatar" style="float:right;width: 250px;height: 250px;border-radius: 110px;">
                                    @endif
                                </div>
                            </div>
                            <div style="text-align:center">
                            <h3>{{ $users->name }} </h3>
                           


                            <ul class="list-unstyled user_data">
                            @if($users->shop_name)
                                <li style="font-size: 18px;">
                                    <i class="fa fa-map-marker user-profile-icon"></i>

                                    <label>   اسم المحل</label>
                                     {{ $users->shop_name }}  
                                    
                                </li>
                            @endif
                            @if($users->shop_type)
                            <li style="font-size: 18px;">
                                <i class="fa fa-map-marker user-profile-icon"></i>
                                <label> نوع المحل</label>
                                 {{ $users->shop_type }}  
                            </li>
                            @endif
                            @if($users->address)
                            <li style="font-size: 18px;">
                                <i class="fa fa-map-marker user-profile-icon"></i>
                                <label>  العنوان</label>
                                 {{ $users->address }}  
                            </li>
                            @endif
                            @if($users->area)
                            <li style="font-size: 18px;">
                                <i class="fa fa-map-marker user-profile-icon"></i>
                                <label>  المنطقه </label>
                                 {{ $users->area }}  
                            </li>
                            @endif
                               

                              
                            </ul>

                            {{-- <a href="{{url('agent/profile/'.$users['id'].'/edit')}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> تعديل البيانات</a> --}}
                            <br />


                        </div>
                    </div>
                       
                    </div>
                </div>
            </div>
        </div>
 

@endsection
