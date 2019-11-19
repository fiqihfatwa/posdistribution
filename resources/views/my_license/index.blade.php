@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">My License</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="btn-group mb-4" role="group">
                <a href="{{ route('mylicense.index') }}" class="btn btn-secondary" disabled="">Stocks</a>
                <a href="{{ route('mylicense.sold') }}" class="btn btn-secondary">Sold</a>
            </div>
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @if (Route::currentRouteName()  == 'mylicense.sold')
                                Sold
                             @else
                                Stocks
                             @endif
                         </div>
                         <div class="card-body table-responsive">
                             @include('my_license.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection