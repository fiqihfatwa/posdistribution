@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('customer.index') !!}">
                    Customer
                </a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <a href="{!! route('customer.index') !!}" class="btn btn-square btn-secondary mb-2">Back</a>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Details</strong>
                            </div>
                            <div class="card-body">
                                @include('my_customer.show_fields')
                            </div>
                        </div>
                    </div>
                </div>

                @include('layouts.tree_css')

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Tree View</strong>
                            </div>
                            <div class="card-body">

                                @if (count($user->childs) == 0)
                                    This customer has not child.
                                @else
                                <ul class="tree">

                                    <li>

                                        <span><a class="text-primary">{{ $user->name }}</a> join_at {{$user->created_at}}</span>

                                        @if(count($user->childs))

                                            @include('my_customer.manage_child',['childs' => $user->childs])

                                        @endif

                                    </li>
            
                                </ul>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
          </div>
    </div>
@endsection
