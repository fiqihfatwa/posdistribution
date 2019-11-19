<div class="row">
    <div class="col-md-6">
        <!-- Name Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Full Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
        </div>

        <!-- Nik Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('nik', 'NIK') !!}
            {!! Form::text('nik', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Gender Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('gender', 'Gender') !!}
            <div class="col-sm-12">
                <label class="radio-inline">
                    {!! Form::radio('gender', "Male", 'selected') !!} Male
                </label>

                <label class="radio-inline">
                    {!! Form::radio('gender', "Female", null) !!} Female
                </label>
            </div>

        </div>

        <!-- Phone Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Address Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('address', 'Address') !!}
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 2]) !!}
        </div>

        </div>
        <div class="col-md-6">

        <!-- Email Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255]) !!}
        </div>

        <!-- Password Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control','minlength' => 8]) !!}
        </div>

        <!-- Password Confirmation Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('password_confirmation', 'Password Confirmation') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control','minlength' => 8]) !!}
        </div>

        <!-- Created By Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('created_by', 'Created By') !!}
            {!! Form::select('created_by', $userItems, null, ['class' => 'form-control']) !!}
        </div>

        <!-- Role Id Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', $roleItems, null, ['class' => 'form-control']) !!}
        </div>

    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! URL::previous() !!}" class="btn btn-default">Cancel</a>
</div>
