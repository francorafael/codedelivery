<div class="form-group">
    {!! Form::label('category', 'Category: ') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description: ') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Price: ') !!}
    {!! Form::text('price', null, ['class'=>'form-control set-numeric', 'required' => 'required']) !!}
</div>