@extends('layouts.masters')
@section('title','All_users')
@section('content-dash')

<h3 class mb-4 style="text-align: center; font-size:32px;">Show All Employee  </h3>

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Manage your user here.</h3>


@if ($success = Session::get('success'))
<div class="alert alert-success">
    <p>{{$success}}</p>
</div>
   @endif


   @can('employee-create')
   <a href="{{route('users.create')}}" class="btn btn-primary btn-sm float-right">Add new Employee</a>
@endcan

<div class="card-body table-responsive p-0">
 <table class="table table-hover text-nowrap">
<thead>
<tr>
<th>{{__('ID')}}</th>
<th>{{__('Name')}}</th>
<th>{{__('Email')}}</th>
<th>Phone</th>
<th>Roles</th>
</tr>
</thead>
<tbody>

@foreach($users as $u)
<tr>
<td>{{$u->id}}</td>
<td>{{$u->name}}</td>
<td>{{$u->email}}</td>
<td>{{$u->profile->phone}}</td>
<td>
    @foreach ($u->roles as $role)
    <span class="badge bg-primary">{{$role->name}}</span>
    @endforeach
</td>

@can('employee-list')
<td><a href="{{route('users.show' , $u->id)}}" class="btn btn-warning btn-sm">Show</a></td>
@endcan


@can('employee-edit')
<td><a href="{{route('users.edit' , $u->id)}}" class="btn btn-info btn-sm">Edit</a></td>
@endcan

@can('employee-delete')
<td>
   {!! Form::open(['method' => 'Delete' , 'route' => ['users.destroy', $u->id], 'style'=>'display:inline'])!!}
   {!! Form::Submit('Delete' , ['class' => 'btn btn-danger btn-sm'])!!}
   {!! Form::close()!!}
</td>
@endcan


</tr>

@endforeach

</tbody>
</table>

</div>
</div>

</div>
{{$users->links()}}

</div>

@endsection