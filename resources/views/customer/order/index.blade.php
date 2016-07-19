@extends('app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN BREADCRUMB -->
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ url ('/') }}">Order</a>
                    </li>
                    <li class="active">My Orders</li>
                </ul>
            </div>
            <!-- END BREADCRUMB -->


            <div class="page-header title">
                <!-- PAGE TITLE ROW -->
                <h1>Order <span class="sub-title">My Orders</span></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('customer.order.new') }}" class="btn btn-primary pull-right" title="Add"><i class="fa fa-plus"></i> New Order</a>
                <div class="clearfix"></div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $o)
                    <tr>
                        <td>{{$o->id}}</td>
                        <td>{{$o->total}}</td>
                        <td class="{{ \CodeDelivery\Http\Helpers\formatClassStatusOrder($o->status) }}">{{\CodeDelivery\Http\Helpers\formatStatusOrder($o->status)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $orders->render() !!}
            </div>
        </div>
    </div>
@endsection