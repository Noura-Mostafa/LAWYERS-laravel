@extends('layouts.masters')
@section('title','All-Roles')
@section('content-dash')

<div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead">
            Manage your roles here.

            @can('role-create')
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
            @endcan
        </div>
        
        <div class="mt-2">
        @if ($success = Session::get('success'))
        <div class="alert alert-success">
        <p>{{$success}}</p>
        </div>
   @endif       
 </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>

                @can('role-list')
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a>
                </td>
                @endcan
                
                @can('role-edit')
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                </td>
                @endcan

                @can('role-delete')
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
                @endcan
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection