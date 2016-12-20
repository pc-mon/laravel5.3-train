<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
    {!! Form::label('fullname', 'Fullname', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fullname', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('idno') ? 'has-error' : ''}}">
    {!! Form::label('idno', 'Idno', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('idno', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('idno', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    {!! Form::label('mobile', 'Mobile', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('mobile', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>