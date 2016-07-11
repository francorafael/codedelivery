@extends('app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN BREADCRUMB -->
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ url ('/') }}">Dashboard</a>
                    </li>
                    <li class="active">Orders</li>
                </ul>
            </div>
            <!-- END BREADCRUMB -->


            <div class="page-header title">
                <!-- PAGE TITLE ROW -->
                <h1>Orders <span class="sub-title">List</span></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="clearfix"></div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Deliveryman</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $o)
                    <tr>
                        <td>#{{$o->id}}</td>
                        <td>$ {{$o->total}}</td>
                        <td>{{$o->created_at}}</td>
                        <td>
                            <ul>
                            @foreach($o->items as $item)
                                <li>{{$item->product->name}}</li>
                            @endforeach
                            </ul>
                        </td>
                        <td>
                            @if($o->deliveryman)
                                {{ $o->deliveryman->name }}
                            @else
                                --
                            @endif

                        </td>
                        <td class="{{ \CodeDelivery\Http\Helpers\formatClassStatusOrder($o->status) }}">{{\CodeDelivery\Http\Helpers\formatStatusOrder($o->status)}}</td>
                        <td>
                            <a href="{{route('admin.orders.edit', $o->id)}}" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $orders->render() !!}
            </div>
        </div>
    </div>
@endsection