@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('users.index') !!}">
                    All Users
                </a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <a href="{!! URL::previous() !!}" class="btn btn-square btn-secondary mb-2">Back</a>
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                             </div>
                             <div class="card-body">
                                 @include('users.show_fields')
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
                                <ul class="tree">
                                    <li>
                                        <a>Parent 3</a>
                                        <ul>
                                            <li>
                                                <a>1st Child of 3</a>
                                                <ul>
                                                    <li><a>1st grandchild</a></li>
                                                    <li><a>2nd grandchild</a></li>
                                                </ul>
                                            </li>
                                            <li><a>2nd Child of 3</a></li>
                                            <li><a>3rd Child of 3</a></li>
                                        </ul>
                                    </li>                                  
                                </ul>
                             </div>
                         </div>
                     </div>
                 </div>

          </div>
    </div>
@endsection
