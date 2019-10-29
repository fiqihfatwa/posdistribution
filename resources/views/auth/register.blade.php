<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register | POSDistribution</title>
    <meta name="description" content="CoreUI Template - InfyOm Laravel Generator">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@0.4.1/css/free.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">

</head>
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <form method="post" action="{{ url('/register') }}">

                        {!! csrf_field() !!}
                        <h1>Register</h1>
                        <p class="text-muted">Create your account</p>

                        <div class="row">
                        <div class="col-md-6">

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input class="form-control {{ $errors->has('name')?'is-invalid':'' }}" id="name" name="name" type="text" placeholder="Enter your full name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                            <input class="form-control {{ $errors->has('nik')?'is-invalid':'' }}" id="nik" name="nik" type="text" placeholder="1234567891011121" value="{{ old('nik') }}">
                            @if ($errors->has('nik'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('nik') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control {{ $errors->has('gender')?'is-invalid':'' }}" id="gender" name="gender">
                                <option value="">Please select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control {{ $errors->has('phone')?'is-invalid':'' }}" id="phone" name="phone" type="text" placeholder="081234567890" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control {{ $errors->has('address')?'is-invalid':'' }}" id="address" name="address" rows="2" placeholder="Enter your address">{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>

                        </div>
                        <div class="col-md-6">

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control {{ $errors->has('email')?'is-invalid':'' }}" id="email" name="email" type="text" placeholder="Enter Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control {{ $errors->has('password')?'is-invalid':'' }}" id="password" name="password" type="password" placeholder="Enter Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password">
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </form>
                </div>
                <div class="card-footer p-4">
                    <div class="text-center">
                        <a class="btn btn-link px-0" href="{{ url('/login') }}">
                            {{ __('I already have a membership') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
</body>
</html>
