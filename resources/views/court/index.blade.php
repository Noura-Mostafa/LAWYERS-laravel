use App\Models\court;
@extends('layouts.masters')
@section('title','All-Courts')
@section('content-dash')

<div class="bg-light p-4 rounded">
        <h2>Courts</h2>
        <div class="lead">
            Manage your Courts here.

            @can('court-create')
            <a href="{{ route('court.create') }}" class="btn btn-primary btn-sm float-right">Add court</a>
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
                <th scope="col" >Court Name</th>
                <th scope="col" >Country</th>
                <th scope="col" >Circle</th>
                <th scope="col" colspan="3" width="1%">Action</th> 
            </tr>
            </thead>
            <tbody>
                @foreach($court as $court)
                    <tr>
                        <td>{{ $court->id }}</td>
                        <td>{{ $court->court_name }}</td>
                        <td>{{ $court->country->Name }}</td>
                        <td>
                            @foreach ($court->circles as $item)
                            {{$item->circle_name}}.<br>
                            @endforeach
                        </td>

                        @can('court-edit')
                        <td><a href="{{ route('court.edit', $court->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                   @endcan

                   @can('court-delete')
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['court.destroy', $court->id],'style'=>'display:inline']) !!}
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