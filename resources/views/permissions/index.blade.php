@extends('layouts.masters')
@section('title','All-Permission')
@section('content-dash')

<div class="bg-light p-4 rounded">
        <h2>Permissions</h2>
        <div class="lead">
            Manage your permissions here.

            @can('permisson-create')
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add permissions</a>
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
                <th scope="col" width="15%">Name</th>
                <th scope="col">Guard</th> 
                <th scope="col" colspan="3" width="1%"></th> 
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>

                        @can('permisson-edit')
                        <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                   @endcan

                   @can('permisson-delete')
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
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