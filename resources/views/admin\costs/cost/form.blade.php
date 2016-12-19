<div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
    {!! Form::label('cost', 'Cost', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('cost', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('trip_to') ? 'has-error' : ''}}">
    {!! Form::label('trip_to', 'Trip To', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('trip_to', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('trip_to', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('trip_from') ? 'has-error' : ''}}">
    {!! Form::label('trip_from', 'Trip From', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('trip_from', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('trip_from', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>