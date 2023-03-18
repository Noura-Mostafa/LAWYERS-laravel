@extends('layouts.masters')
@section('title','show_users')
@section('content-dash')

<div class="bg-light p-4 rounded">
        <h1>Show Employee details</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Name: {{ $user->name }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>
        </div>

    </div>
    
@endsection