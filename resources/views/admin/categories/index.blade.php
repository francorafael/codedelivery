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
                    <li class="active">Categories</li>
                </ul>
            </div>
            <!-- END BREADCRUMB -->


            <div class="page-header title">
                <!-- PAGE TITLE ROW -->
                <h1>Categories <span class="sub-title">List</span></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary pull-right" title="Add"><i class="fa fa-plus"></i> Add</a>
                <div class="clearfix"></div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->name}}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $c->id)}}" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.categories.delete', $c->id)}}" class="btn btn-primary" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $categories->render() !!}
            </div>
        </div>
    </div>
@endsection