@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Add Products') }}</div>

                <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  

                  @include('alert_message')

                  {!!Form::open(['url'=>'/product/save', 'enctype' => 'multipart/form-data', 'method'=>'post']) !!}    

                    <div class="form-group">
                      <div class="col-md-12">
                        {!!Form::label('name','Product Name') !!} <span style="color:red;">*</span>
                     
                        {!!Form::text('name',null,['class' => 'form-control','placeholder' => 'Please Enter Product Name','required' => 'required']) !!}
                      
                      </div>

                      <div class="col-md-12" style="margin-top: 10px;">
                        {!!Form::label('category ','Select Category') !!} <span style="color:red;">*</span>
                        <select class="form-control" name="category" required="required"> 
                          <option value="0">Select</option>
                          @foreach($Category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach()
                        </select>

                      </div>
                    
                      <div class="col-md-12" style="margin-top: 10px;">
                        {!!Form::label('image','Image') !!} <span style="color:red;">*</span>
                        <br>
                        {!!Form::file('image',null,['class' => 'form-control','required' => 'required']) !!}
     
             
                      </div>
                      <div class="col-md-12" style="margin-top: 10px;">
                        {!!Form::label('desc','Description') !!} <span style="color:red;">*</span>
                       
                        {!!Form::textarea('desc',null,['class' => 'form-control','placeholder' => 'Please Enter Product Description','required' => 'required']) !!}
               
                      </div>

                      <div class="col-md-12" style="margin-top: 20px; float:right;">
                        <div class="row">
                            <div class="col-md-1 ">
                              <a href="">{!! Form::button('Cancle',array('class'=>'btn btn-light')) !!} </a>
                            </div>  
                            <div class="col-md-1 ">
                              {!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}
                            </div>
                            
                        </div>    
                      </div> 

                    </div>  
                  
                  {!!Form::close()!!}                           
                         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
