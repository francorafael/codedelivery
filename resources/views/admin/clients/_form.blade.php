<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('user[name]', null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email: ') !!}
    {!! Form::text('user[email]', null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone: ') !!}
    {!! Form::text('phone', null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('address', 'Address: ') !!}
    {!! Form::textarea('address', null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', 'City: ') !!}
    {!! Form::text('city', null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('state', 'State: ') !!}
    {!! Form::text('state', null, ['class'=>'form-control', 'required' => 'required', 'maxlenght' => '2']) !!}
</div>

<div class="form-group">
    {!! Form::label('zipcode', 'Zip Code: ') !!}
    {!! Form::text('zipcode', null, ['class'=>'form-control', 'required' => 'required', 'maxlenght' => '8']) !!}
</div>