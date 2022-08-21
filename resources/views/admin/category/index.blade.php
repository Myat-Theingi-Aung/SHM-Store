@extends('../layout/backend/master')
@section('title')SHM Store | Category List @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">Category List</h3>
            <button class="cmn-btn"><a href="{{ route('admin.category.create') }}">Create</a></button>
        </div>
        <hr>
        <table>
            <thead>
                <tr class="row">
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->name }}</td> 
                    <td>{{ $category->created_at->toFormattedDateString() }} MMK</td>
                    <td>
                        <div class="btn-div clearfix">
                                <button><a href="{{ route('admin.category.edit',$category->id) }}">Edit</a></button>
                                <button><a href="{{ route('admin.category.delete',$category->id) }}">Delete</a></button>
                        </div>
                    </td>
                </tr>
            @endforeach      
            </tbody>
        </table>
    </div>
</div>

@endsection