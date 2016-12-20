<div class="form-group {{ $errors->has('passenger_id') ? 'has-error' : ''}}">
    {!! Form::label('passenger_id', 'Passenger Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('passenger_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('passenger_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('trip_id') ? 'has-error' : ''}}">
    {!! Form::label('trip_id', 'Trip Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('trip_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('trip_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>