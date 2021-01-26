@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                  @endif
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="card bg-primary">
                        <div class="card-body text-white">
                          <div style="font-size:25px;">
                            <b>{{$Category}}</b>
                          </div>  
                          <div>
                            {{ __('Total Category') }}
                          </div>  
                        </div>  
                      </div>  
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="card bg-success text-white">
                        <div class="card-body">
                          <div style="font-size:25px;">
                            <b>{{$Product}}</b>
                          </div> 
                          <div>
                            {{ __('Total Product') }}
                          </div> 
                        </div>  
                      </div>
                    </div>

                  </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
