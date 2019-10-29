<!-- License Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license_key', 'License Key:') !!}
    {!! Form::text('license_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Sold In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sold_in', 'Sold In:') !!}
    {!! Form::number('sold_in', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('licenses.index') !!}" class="btn btn-default">Cancel</a>
</div>
