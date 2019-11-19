@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('order.index') !!}">Order</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{!! route('order.history') !!}">History</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')

            @if (session('status'))
            <div class="alert {{ session('status') }} fade show" role="alert">
                {{ session('message') }}
            </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-6">
                     <div class="card">
                         <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td >Transaction Number</td>
                                    <td class="text-right">{{ $transaction->transaction_number }}</td>
                                </tr>
                                <tr>
                                    <td >Date</td>
                                    <td class="text-right">{{ date('d M Y H:i:s', strtotime($transaction->created_at)) }}</td>
                                </tr>
                                <tr>
                                    <td >Status</td>
                                    <td class="text-right">
                                        @if ($transaction->status_id == 1)
                                            <span class="badge badge-warning">{{ $transaction->status->name }}</span>
                                        @elseif ($transaction->status_id == 2)
                                            <span class="badge badge-primary">{{ $transaction->status->name }}</span>
                                        @elseif ($transaction->status_id == 3)
                                            <span class="badge badge-success">{{ $transaction->status->name }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $transaction->status->name }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                         </div>
                     </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                     <div class="card">
                         <div class="card-header">
                             Transaction Detail
                         </div>
                         <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td >Package Name</td>
                                    <td class="text-right">{{ $transaction->package->name }}</td>
                                </tr>
                                <tr>
                                    <td>Qty of license</td>
                                    <td class="text-right">{{ $transaction->package->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Nominal</td>
                                    <td class="text-right">Rp {{ number_format($transaction->package->price) }}</td>
                                </tr>
                                <tr>
                                    <td>Admin Fee</td>
                                    <td class="text-right">Rp 0</td>
                                </tr>
                                <tr>
                                    <td><h5>Total</h5></td>
                                    <td class="text-right"><h5>Rp {{ number_format($transaction->package->price) }}</h5></td>
                                </tr>
                            </table>


                         </div>
                     </div>
                </div>
            </div>

            @if ($transaction->status_id == 3)
            <div class="row justify-content-center">
                <div class="col-lg-6">
                     <div class="card">
                         <div class="card-header">
                            Product Detail
                         </div>
                         <div class="card-body">
                            @foreach ($licenses as $license)
                                {{$loop->iteration}}. {{ $license->license_key }}
                            @endforeach
                         </div>
                     </div>
                </div>
            </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-6">
                     <div class="card">
                         <div class="card-header">
                             Payment Method
                         </div>
                         <div class="card-body">
                            

 
                         </div>
                     </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                     <div class="card">
                        <div class="card-header">
                            Payment Upload
                        </div>

                        @if ($transaction->status_id == 1)
                            {!! Form::open(['route' => ['order.update', $transaction->id], 'enctype' => 'multipart/form-data', 'method' => 'patch']) !!}
                                <div class="card-body">
                                    {!! Form::file('payment_img'); !!}
                                </div>     
                                <div class="card-footer">
                                    {!! Form::submit('Upload', ['class' => 'btn btn-block btn-success']) !!}
                                </div>
                            {!! Form::close() !!}
                        @else
                            <div class="card-body">
                                <img src='{!! Storage::url("$transaction->payment_img") !!}' height="200">
                            </div>
                        @endif    
                        
                     </div>
                </div>
            </div>           

         </div>
    </div>
@endsection

