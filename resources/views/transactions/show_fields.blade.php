<!-- Transaction Number Field -->
<div class="form-group">
    {!! Form::label('transaction_number', 'Transaction Number:') !!}
    <p>{!! $transaction->transaction_number !!}</p>
</div>

<!-- Customer Id Field -->
<div class="form-group">
    {!! Form::label('customer_id', 'Customer:') !!}
    <p>{!! $transaction->customer->name !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group">
    {!! Form::label('shop_id', 'Seller:') !!}
    <p>{!! $transaction->seller->name !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group">
    {!! Form::label('package_id', 'Package:') !!}
    <p>{!! $transaction->package->name !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{!! $transaction->package->amount !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group">
    {!! Form::label('grand_total', 'Grand Total:') !!}
    <p>{!! $transaction->grand_total !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status:') !!}
    <p>{!! $transaction->status->name !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group">
    {!! Form::label('payment_img', 'Payment Image:') !!}
    <p><img src='{!! Storage::url("$transaction->payment_img") !!}' height="200"></p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transaction->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transaction->updated_at !!}</p>
</div>

