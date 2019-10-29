@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Order</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')

            <div class="row">

                @foreach($packages as $package)
                <div class="col-md-3">
                    <a href='{{ url("order/$package->id") }}' style="text-decoration: none">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-uppercase" style="color: #2f353a"><strong>{{ $package->name }}</strong></h5>
                                <h6 style="color: #2f353a">Qty <strong>{{ $package->amount }}</strong></h6>
                                <span style="color: #f57c00">Price <strong>Rp{{ number_format($package->price) }}</strong></span>
                                <button class="btn btn-primary btn-sm pull-right">Choose</button>
                            </div>
                        </div>
                    </a>          
                </div>
                @endforeach  

            </div>           

         </div>
    </div>
@endsection

