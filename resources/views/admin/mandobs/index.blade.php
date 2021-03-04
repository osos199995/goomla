@extends('layouts.main')
@section('content')


<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">

          <h2> المندوبين </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li> <a href="{{ url('admin/mandobs/create') }}"> <i class="fa fa-plus"></i>اضافه</a></li>


            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">

          <table class="table table-striped">
            <thead  class="thead-light">
              <tr>
              <th>#</th>
              <th>   اسم المندوب  </th>
              <th>   منطقه المندوب  </th>
              <th>   عنوان المندوب  </th>
              <th>   تفعيل  المندوب  </th>
              <th>   الغاء تفعيل  المندوب  </th>

              <th width="15%">التحكم</th>

            </tr>
          </thead>
          <tbody>
          @foreach($mandobs as $i=>$store)

            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{ $store['name'] }}</td>
                <td>{{ $store['section'] }}</td>
                <td>{{ $store['address'] }}</td>
                <td>
                    <form method="get" action="{{ url('admin/mandoobs/status/'.$store['id']) }}"  >
                        {{ csrf_field() }}
                        @if($store->status != 1)
                            <button type="submit" onclick="return confirm('هل انت متأكد من تفعيل المستخدم؟')" class="btn btn-success">
                                <i class="fa fa-check-circle"></i>
                            </button>
                        @endif
                    </form>
                </td>



                <td>
                <a href="{{url('admin/mandoobs/'.$store['id'].'/edit')}}" class="btn btn-success" >
                <span class="glyphicon glyphicon-eye-open"></span>
                 </a>


{{--                 <form method="POST" onclick="return confirm('Are you sure?')" action="{{ url('admin/mandobs/'.$store['id']) }}"  style="display:inline" >--}}

{{--                <button name="_method" type="hidden" value="DELETE" class="btn btn-default btn-sm">--}}
{{--                <span class="glyphicon glyphicon-remove"></span>--}}
{{--                </button>--}}
{{--                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                </form>--}}

               </td>

                <td>
                    <form method="get" action="{{ url('admin/mandoobs/block/'.$store['id']) }}"  >
                        {{ csrf_field() }}

                        @if($store->status != 0)
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

        </div>
        </div>
        </div>


@endsection
