@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('alert_message')
                    <div class="col-lg-12">
                        <div class="text-right">
                            <a href="{{URL('/product/add')}}">
                              <button class="btn btn-primary">Add</button>
                            </a>
                        </div>  
                    </div>    
                    <div class="table-responsive" style="margin-top: 20px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                  <th scope="col">S.no</th>
                                  <th scope="col">Product Name</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Description</th>
                                  <th colspan="3">Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Product as $no => $prd)
                                   <tr>
                                       <td> {{ $prd->id }} </td>
                                       <td> {{ $prd->name }} </td>
                                       <td> 
                                         <img src="{{ URL('public/product')}}/{{ $prd->image }}"width="50" height="50">
                                        </td>
                                        @foreach($Category as $category)
                                           @if($category->id == $prd->category)
                                              <td>{{ $category->name }}</td>
                                           @endif()
                                        @endforeach()

                                       <td> {{ $prd->desc }} </td>
                                        <td> 
                                            <a href="{{URL('/product/edit')}}/{{$prd->id}}">
                                                {{ Form::submit('Edit',array('class'=>'btn btn-primary')) }}
                                            </a>
                                        </td>
                                        <td> 
                                            <a href="{{URL('/product/delete')}}/{{$prd->id}}">
                                                {{ Form::submit('Delete',array('class'=>'btn btn-danger')) }}
                                            </a>
                                        </td>
                                   </tr> 
                                @endforeach()
                            </tbody>
                        </table>

                        <div class="col-lg-12">
                          <div class="text-right">
                            {!! $Product->links() !!}
                          </div>  
                        </div>
                        
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
