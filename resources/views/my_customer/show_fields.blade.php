<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Full Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Nik Field -->
<div class="form-group">
    {!! Form::label('nik', 'NIK:') !!}
    <p>{!! $user->nik !!}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{!! $user->gender !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $user->address !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $user->phone !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

