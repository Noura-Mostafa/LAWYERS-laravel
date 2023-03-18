@extends('layouts.masters')
@section('title','create-court')
@section('content-dash')


<div class="bg-light p-4 rounded">
        <h1>Add new court</h1>
        <div class="lead">
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
                <div class="card-header">{{__('Create Court')}}
                    <span class="float-right">
                        <a href="{{ route('court.index') }}" class="btn btn-primary">{{__('Courts')}}</a>
                    </span>
                </div>
                <div class="card-body">
                    {!! Form::open(array('route'=>'court.store','method'=>'POST'))!!} 
                    <div class="form-group">
                        <strong>{{ __('Country')}}:</strong>
                        <select name="country_id" id="country_id" class="form-control" required autofocus>
                            <option value="">{{ __('Select Country')}}</option>
                            @foreach ($country as $item)
                            <option value="{{$item->id}}">{{$item->Name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>{{ __('Court')}}</strong>
                        {!! Form::text('court_name' , null , array('placeholder'=> __('court') , 'class'=>'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('submit')}}</button>
                    {!!Form::close()!!}
                </div>
            </div>
@endsection