<!-- License Key Field -->
<div class="form-group">
    {!! Form::label('license_key', 'License Key:') !!}
    <p>{!! $license->license_key !!}</p>
</div>

<!-- Sold In Field -->
<div class="form-group">
    {!! Form::label('sold_in', 'Sold In:') !!}
    <p> 
        @if ($license->sold_in)
           {!! $license->transaction->transaction_number !!}
        @else
            -
        @endif
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $license->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $license->updated_at !!}</p>
</div>

