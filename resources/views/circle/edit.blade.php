use App\Models\court;
@extends('layouts.masters')
@section('title','edit-circle')
@section('content-dash')


<div class="bg-light p-4 rounded">
        <h1>Add new circle</h1>
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
                <div class="card-header">{{__('Edit Circle')}}
                    <span class="float-right">
                        <a href="{{ route('circle.index') }}" class="btn btn-primary">{{__('Circles')}}</a>
                    </span>
                </div>
                <div class="card-body">
                {!! Form::model($circle , ['route' =>['circle.update' , $circle->id] , 'method'=>'PATCH'])!!} 
                    <div class="form-group">
                        <strong>{{ __('Courts')}}:</strong>
                        <select name="court_id" id="court_id" class="form-control" required autofocus>
                            <option value="">{{ __('Select Court')}}</option>
                            @foreach ($court as $item)
                            <option value="{{$item->id}}">{{$item->court_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>{{ __('circle name')}}</strong>
                        {!! Form::text('circle_name' , null , array('placeholder'=> __('circle name') , 'class'=>'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('submit')}}</button>
                    {!!Form::close()!!}
                </div>
            </div>
@endsection