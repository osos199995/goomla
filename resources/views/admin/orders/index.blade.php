@extends('layouts.main')
@section('content')


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">

                <h2> الطلبات </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li> <a href="{{ url('admin/orders/create') }}"> <i class="fa fa-plus"></i>اضافه</a></li>


                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th> حالة الطلب</th>
                            <th>تاريخ الطلب</th>
                            <th>اسم المستخدم</th>
                            {{-- <th>اجمالي الخصم </th> --}}
                            <th width="15%">التحكم</th>
                        </tr>
                    </thead>
                        @foreach ($orders as $i => $order)

                        <tbody>
                          <tr>
                              <th scope="row">{{ ++$i }}</th>
                              @if ($order->complete_id == 0)
                              <td>لم يتم الشحن</td>
                                @elseif($order->complete_id == 1)
                                  <td>تم الشحن</td>

                                  @endif
                              <td>{{Carbon\Carbon::parse($order->created_at)->diffForHumans()  }}</td>
                              <td>{{ \App\User::where('id',$order->user_id)->pluck('name')->first() }}</td>
                              {{-- <td>{{ $order->order_id }}</td> --}}
                              {{-- <td>{{ $order->price }}</td> --}}
                              <td>
                                <a href="{{ url('admin/orders/show/'.$order->user_id .'/'. $order->order_id ) }}" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                                  {{-- <a href="{{ url('admin/orders/' . $order->id . '/track') }}" class="btn btn-success">
                                      <i class="fa fa-motorcycle"></i>
                                  </a> --}}
                                  <form method="POST" onclick="return confirm('Are you sure?')"
                                      action="{{ url('admin/orders/' . $order['id']) }}" style="display:inline">

                                      <button name="_method" type="hidden" value="DELETE" class="btn btn-default btn-sm">
                                          <span class="glyphicon glyphicon-remove"></span>
                                      </button>
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  </form>
                              </td>
                          </tr>
                        </tbody>
                        @endforeach
                </table>

            </div>
        </div>
    </div>


@endsection
