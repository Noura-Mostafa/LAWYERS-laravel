@extends('layouts.masters')
@section('title','All-Circles')
@section('content-dash')

<div class="bg-light p-4 rounded">
        <h2>Circle</h2>
        <div class="lead">
            Manage your Circle here.

            @can('circle-create')
            <a href="{{ route('circle.create') }}" class="btn btn-primary btn-sm float-right">Add Circle</a>
            @endcan
        </div>
        
        <div class="mt-2">
        @if ($success = Session::get('success'))
        <div class="alert alert-success">
        <p>{{$success}}</p>
        </div>
   @endif
 </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th scope="col" >Circle Name</th>
                <th scope="col" >Court</th>
                <th scope="col" colspan="3" width="1%">Action</th> 
            </tr>
            </thead>
            <tbody>
                @foreach($circle as $circle)
                    <tr>
                        <td>{{ $circle->id }}</td>
                        <td>{{ $circle->circle_name }}</td>
                        <td>{{ $circle->court->court_name }}</td>

                        @can('circle-edit')
                        <td><a href="{{ route('circle.edit', $circle->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                   @endcan

                   @can('circle-delete')
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['circle.destroy', $circle->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>

                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection