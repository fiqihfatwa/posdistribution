@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            @if (Request::is('users/all'))
                Users
            @else
                Customer
            @endif
        </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @if (Request::is('users/all'))
                                Users
                             @else
                                Customer
                             @endif
                             <a class="pull-right" href="{!! route('users.create') !!}"><i class="fa fa-plus"></i> Create</a>
                         </div>
                         <div class="card-body table-responsive">
                             @include('users.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

