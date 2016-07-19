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
                    <li class="active">New Order</li>
                </ul>
            </div>
            <!-- END BREADCRUMB -->


            <div class="page-header title">
                <!-- PAGE TITLE ROW -->
                <h1>Order <span class="sub-title">New</span></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('customer.order.index') }}" class="btn btn-primary pull-right" title="List"><i class="fa fa-list"></i> My Orders</a>
                <div class="clearfix"></div>
                @include('errors._check')

                {!! Form::open(['route' =>'customer.order.store'])!!}


                <div class="form-group">
                   <div class="alert alert-info col-md-2">
                    <label>Total: </label>
                    <p id="total"></p>
                   </div>
                    <div style="clear:both"></div>
                    <a href="#" class="btn btn-primary" id="btnNewItem">New Item</a> <br />

                    <table class="table table-bordered">
                        <thead>
                            <th>Product</th>
                            <th>Quantity</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <select class="form-control" name="items[0][product_id]">
                                    @foreach($products as $p)
                                        <option value="{{$p->id}}" data-price="{{$p->price}}">{{$p->name . '--- $'. $p->price}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>{!! Form::text('items[0][qtd]', 1,['class' => 'form-control']) !!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    {!! Form::submit('Create Order', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('post-script')
    <script type="text/javascript">

        $('#btnNewItem').click(function()
        {
            var row = $('table tbody > tr:last'),
                    newRow = row.clone(),
                    lenght = $("table tbody tr").length;

            newRow.find('td').each(function() {
                var td = $(this), input = td.find('input, select'),
                        name = input.attr('name');
                input.attr('name', name.replace((lenght - 1) + "", lenght + ""));

            });

            newRow.find('input').val(1);
            newRow.insertAfter(row);
        });

        $(document.body).on('click', 'select', function (){
            calculateTotal();
        });

        $(document.body).on('blur', 'input', function (){
            calculateTotal();
        });

        function calculateTotal()
        {
            var total = 0;
            var trLen = $('table tbody tr').length;
            var td = null;
            var price, qtd;

            for (var i = 0; i < trLen; i++)
            {
                tr = $('table tbody tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input').val();
                total += price * qtd;
            }

            $('#total').html(total);
        }
    </script>
@endsection