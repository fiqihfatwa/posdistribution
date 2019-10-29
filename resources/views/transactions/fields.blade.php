<!-- Transaction Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_number', 'Transaction Number:') !!}
    {!! Form::text('transaction_number', 'AUTO_GENERATE', ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer:') !!}
    {!! Form::select('customer_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_id', 'Seller:') !!}
    {!! Form::select('shop_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('package_id', 'Package:') !!}
    {!! Form::select('package_id', $packageItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id', $statusItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_img', 'Upload Payment:') !!} <br>
    {!! Form::file('payment_img'); !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transactions.index') !!}" class="btn btn-default">Cancel</a>
</div>
