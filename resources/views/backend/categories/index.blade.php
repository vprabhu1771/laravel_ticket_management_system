@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">{{ $message }}</div>
@endif

<div class="card">

    <div class="card-header">        
        <a class="btn btn-success" href="{{ route('categories.create') }}">Create New</a>        
    </div>
    <div class="card-body">
        <table id="categories-table" class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>                    
                    <th width="180px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>                    
                    <td>
                        
                        <a class="btn btn-primary btn-sm" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                        
                        
                        <form action="{{ route('categories.destroy',$category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection

@section('js')
<script>
    $(function () {
        $('#categories-table').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
@stop