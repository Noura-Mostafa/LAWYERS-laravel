@extends('layouts.masters')
@section('title','edit-court')
@section('content-dash')


<div class="bg-light p-4 rounded">
        <h1>Update Court</h1>
        <div class="lead">
            Edit Court
        </div>

        <div class="container mt-4">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

           
            <div class="card">
                <div class="card-header">{{__('Edit Court')}}
                    <span class="float-right">
                        <a href="{{ route('court.index') }}" class="btn btn-primary">{{__('Courts')}}</a>
                    </span>
                </div>
                <div class="card-body">
                    {!! Form::model($court , ['route' =>['court.update' , $court->id] , 'method'=>'PATCH'])!!} 
                    <div class="form-group">
                        <strong>{{ __('Country')}}:</strong>
                        <select name="country_id" id="country_id" class="form-control" required autofocus>
                            <option value="">{{ __('Select Country')}}</option>
                            @foreach ($country as $con)
                            <option value="{{$con->id}}" @if($con->id == $court->country_id) selected @endif >{{$con->Name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>{{ __('Court')}}</strong>
                        {!! Form::text('court_name' , null , array( 'placeholder'=> __('court name'),'class'=>'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('submit')}}</button>
                    {!!Form::close()!!}
                </div>
            </div>
@endsection