@extends('adminlte::page')

@section('title', 'Create Category')

@section('content_header')
    <h1>Create Category</h1>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="card">
    
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @include('backend.categories.form')
        </form>
    </div>

</div>
@endsection
