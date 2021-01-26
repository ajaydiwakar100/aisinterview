@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Category List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <div class="table-responsive" style="margin-top: 20px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                  <th scope="col">S.no</th>
                                  <th scope="col">Category Name</th>
                                  <th scope="col">Image</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Category as $no => $category)
                                   <tr>
                                       <td> {{ $category->id }} </td>
                                       <td> {{ $category->name }} </td>
                                       <td> 
                                         <img src="{{ URL('public/Images')}}/{{ $category->image }}"width="50" height="50">
                                        </td>
                                      
                                    </tr> 
                                @endforeach()
                            </tbody>
                        </table>

                        <div class="col-lg-12">
                          <div class="text-right">
                            {!! $Category->links() !!}
                          </div>  
                        </div>
                        
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
