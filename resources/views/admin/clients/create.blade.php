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
                        <a href="{{ route('admin.clients.index') }}">Clients</a>
                    </li>
                    <li class="active">Add Client</li>
                </ul>
            </div>
            <!-- END BREADCRUMB -->


            <div class="page-header title">
                <!-- PAGE TITLE ROW -->
                <h1>Client <span class="sub-title">Add</span></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <a href="{{ route('admin.clients.index') }}" class="btn btn-primary pull-right" title="List"><i class="fa fa-list"></i> List</a>
            <div class="clearfix"></div>
            @include('errors._check')

            {!! Form::open(['route'=>'admin.clients.store'])!!}

            @include('admin.clients._form')

            <div class="form-group">
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection