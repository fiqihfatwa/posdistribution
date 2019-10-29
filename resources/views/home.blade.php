@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Dashboard</li>
</ol>
  <div class="container-fluid">
        <div class="animated fadeIn">
            
            @if (Auth::user()->role_id == 1)
            <div class="row">

                <div class="col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="icon-people"></i>
                            </div>
                            <div class="text-value">{{$users}}</div>
                            <small class="text-muted text-uppercase font-weight-bold">All User</small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="icon-bag"></i>
                            </div>
                            <div class="text-value">{{$transactions}}</div>
                            <small class="text-muted text-uppercase font-weight-bold">All Transaction</small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="icon-key"></i>
                            </div>
                            <div class="text-value">{{$licenses}}</div>
                            <small class="text-muted text-uppercase font-weight-bold">All License</small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="icon-layers"></i>
                            </div>
                            <div class="text-value">{{$packages}}</div>
                            <small class="text-muted text-uppercase font-weight-bold">All Package</small>
                        </div>
                    </div>
                </div>

            </div>
            @endif

            <h6>MY SHOP</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center" style="background-color: #e1f5fe">
                            <div class="text-muted small text-uppercase font-weight-bold">New Payment</div>
                            <div class="text-value-lg py-3">{{$newpayment}}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body p-0 d-flex align-items-center">
                            <i class="fa fa-users bg-primary p-4 px-5 font-2xl mr-3"></i>
                            <div>
                                <div class="text-value-sm text-primary">{{$mycustomers}}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">My Customer</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body p-0 d-flex align-items-center">
                            <i class="fa fa-shopping-bag bg-info p-4 px-5 font-2xl mr-3"></i>
                            <div>
                                <div class="text-value-sm text-info">{{$mytransactions}}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Transaction</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body p-0 d-flex align-items-center">
                            <i class="fa fa-key bg-warning p-4 px-5 font-2xl mr-3"></i>
                            <div>
                                <div class="text-value-sm text-warning">{{$mystocks}}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Stock License</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body p-0 d-flex align-items-center">
                            <i class="fa fa-cubes bg-danger p-4 px-5 font-2xl mr-3"></i>
                            <div>
                                <div class="text-value-sm text-danger">{{$mypackages}}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">My Package</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @if (Auth::user()->role_id != 1)
            <h6>MY ORDER</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center" style="background-color: #fff3e0">
                            <div class="text-muted small text-uppercase font-weight-bold">Order Waiting Payment</div>
                            <div class="text-value-lg py-3">{{$orderpayment}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center" style="background-color: #e1f5fe">
                            <div class="text-muted small text-uppercase font-weight-bold">Order Waiting Confirmation</div>
                            <div class="text-value-lg py-3">{{$orderconfirmation}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center" style="background-color: #e8f5e9">
                            <div class="text-muted small text-uppercase font-weight-bold">Order Complete</div>
                            <div class="text-value-lg py-3">{{$ordercomplete}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
