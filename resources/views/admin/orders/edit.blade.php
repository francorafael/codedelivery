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
                    <li>
                        <a href="{{ route('admin.orders.index') }}">Orders</a>
                    </li>
                    <li class="active">Edit Order - #{{ $order->id }}</li>
                </ul>
            </div>
            <!-- END BREADCRUMB -->


            <div class="page-header title">
                <!-- PAGE TITLE ROW -->
                <h1>Order <span class="sub-title">Edit Order - #{{ $order->id }}</span></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary pull-right" title="List"><i class="fa fa-list"></i> List</a>
                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-lg-4 col-sm-4">
                        <a href="#" class="tile-button btn btn-primary">
                            <div class="tile-content-wrapper">
                                <i class="fa fa-money"></i>
                                <div class="tile-content">
                                     $ {{ $order->total }}<br />
                                    {{ $order->created_at }}
                                </div>
                                <small>
                                    <h3>Order #{{ $order->id }} - </h3>
                                </small>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-4">
                        <a href="#" class="tile-button btn btn-inverse">
                            <div class="tile-content-wrapper">
                                <i class="fa fa-user"></i>
                                <div class="tile-content">
                                    {{ $order->client->user->name }}
                                </div>
                                <small>
                                    Client
                                </small>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-4">
                        <a href="#" class="tile-button btn btn-primary">
                            <div class="tile-content-wrapper">
                                <i class="fa fa-ticket"></i>
                                <div class="tile-content">
                                    {{ $order->client->address }} <br /> {{ $order->client->city }}/{{ $order->client->state }}
                                </div>
                                <small>
                                    <h3> Delivering at:</h3>
                                </small>
                            </div>
                        </a>
                    </div>

                </div>


                {!! Form::model($order, ['route'=>['admin.orders.update', $order->id]])!!}

                <div class="form-group">
                    {!! Form::label('status', 'Status: ') !!}
                    {!! Form::select('status', $list_status, null, ['class'=>'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('entregador', 'Entregador: ') !!}
                    {!! Form::select('user_deliveryman_id', $deliveryman, null, ['class'=>'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection