@extends('layouts.main')
@section('content')


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">

                <h2> تفاصيل الطلب </h2>
                <ul class="nav navbar-right panel_toolbox">
                    {{-- <li> <a href="{{ url('admin/orders/create') }}"> <i class="fa fa-plus"></i>اضافه</a></li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li> --}}

                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>اسم المنتج</th>

                            <th> سعر الفاتورة </th>
                            <th>  الكميه المطلوبه </th>
                            <th>اسم المندوب</th>
                            <th>تاريخ تسليم المندوب</th>

                            <th>حالة تسليم المندوب للمنتج</th>

                            {{-- <th width="15%">التحكم</th> --}}
                        </tr>
                    </thead>
                        @foreach ($orders as $i => $order)

                        <tbody>
                          <tr>
                              <th scope="row">{{ ++$i }}</th>
                              <td>{{ $order->product->name }}</td>

                              <td>{{ $order->price }}</td>
                              <td>{{ $order->quantity }}</td>
                              @if(isset($order->mandob->name))
                              <td>{{ $order->mandob->name }}</td>
                              @else
                                  <td>لم يعين مندوب بعد</td>
                                  @endif

                              @if(!empty($order->mandob_date))
                                  <td>{{ $order->mandob_date }}</td>
                              @else
                                  <td>لم يعين مندوب بعد</td>
                              @endif

                              @if(($order->mandob_stage == 0))
                                  <td>المندوب لم يستلم الطلب بعد</td>
                              @elseif($order->mandob_stage == 1)
                                  <td>المندوب قام بتسليم الطلب</td>
                              @elseif($order->mandob_stage == 2)
                                  <td>المندوب لم يقم بتسليم الطلب</td>
                              @endif

                              {{-- <td>
                                  <form method="POST" onclick="return confirm('Are you sure?')"
                                      action="{{ url('admin/orders/' . $order['id']) }}" style="display:inline">

                                      <button name="_method" type="hidden" value="DELETE" class="btn btn-default btn-sm">
                                          <span class="glyphicon glyphicon-remove"></span>
                                      </button>
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  </form>
                              </td> --}}
                          </tr>
                        </tbody>
                        @endforeach
                        <a href="{{ url('admin/orders/' . $first->id . '/mandobs') }}" class="btn btn-success" style="float: right">
                            <i class="fa fa-user"></i>
                        </a>
                        <a href="{{ url('admin/orders/' . $first->id . '/track') }}" class="btn btn-success" style="float: right">
                            <i class="fa fa-motorcycle"></i>
                        </a>
                </table>

            </div>
        </div>
    </div>


@endsection
