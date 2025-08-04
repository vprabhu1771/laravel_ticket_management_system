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
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @method('PUT')
            @include('backend.categories.form', ['category' => $category])
        </form>
    </div>

</div>
@endsection
