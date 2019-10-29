@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Order</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
                @if (session('status'))
                <div class="alert alert-danger fade show" role="alert">
                    {{ session('status') }}
                </div>
                @endif

            <div class="row justify-content-center">
                <div class="col-lg-6">
                     <div class="card">
                         <div class="card-header">
                             Detail Transaksi
                         </div>
                         <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td >Package Name</td>
                                    <td class="text-right">{{ $package->name }}</td>
                                </tr>
                                <tr>
                                    <td>Qty of license</td>
                                    <td class="text-right">{{ $package->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Nominal</td>
                                    <td class="text-right">Rp {{ number_format($package->price) }}</td>
                                </tr>
                                <tr>
                                    <td>Admin Fee</td>
                                    <td class="text-right">Rp 0</td>
                                </tr>
                                <tr>
                                    <td><h5>Total</h5></td>
                                    <td class="text-right"><h5>Rp {{ number_format($package->price) }}</h5></td>
                                </tr>
                            </table>

                            <form method="post" action="{{ route('transactions.store') }}">
                                @csrf
                                <input type='hidden' name='transaction_number' value='AUTO_GENERATE'>
                                <input type='hidden' name='package_id' value='{{$package->id}}'>
                                <input type='hidden' name='status_id' value='1'>
                                <input type='hidden' name='customer_id' value='{{Auth::user()->id}}'>
                                <input type='hidden' name='shop_id' value='{{$package->user_id}}'>
                                <input class="btn btn-block btn-success btn-pill" type="submit" value='Confirm'>
                            </form>
                         </div>
                     </div>
                </div>
            </div>           

         </div>
    </div>
@endsection

