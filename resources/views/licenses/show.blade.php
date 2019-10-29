@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('licenses.index') !!}">License</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <a href="{!! route('licenses.index') !!}" class="btn btn-square btn-secondary mb-2">Back</a>
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                             </div>
                             <div class="card-body">
                                 @include('licenses.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>

                 @if (Auth::user()->role_id == 1)
                    @if ($license->sold_in)
                    @include('layouts.tree_css')

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Tree View</strong>
                                </div>
                                <div class="card-body">
                                    @foreach ($licenses as $row)
                                    <ul class="@if ($loop->index == 0) tree @endif">
                                        <li>
                                            <?php $user_id = $row->user->id ?> 
                                            <span>
                                                <a href='{{ url("users/$user_id") }}'> {{ $row->user->name }} </a> 
                                                @if($row->sold_in != 0)  
                                                    transaction_number: <a href="#">  {{ $row->transaction->transaction_number }} </a> 
                                                @endif
                                            </span>
                                    @endforeach

                                    @foreach ($licenses as $row)
                                        </li>                                  
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endif
          </div>
    </div>
@endsection
