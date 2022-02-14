@extends("layouts.app")

@section('title') Edit Category @endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Manager</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
</x-breadcrumb>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">
                    <i class="feather-layers"></i>
                    Edit Category
                </h4>
                <hr>                

                <form action="{{ route('category.update', $category->id) }}" class="mb-3" method="post">
                    @csrf
                    @method('put')
                    <div class="form-inline">
                        <input type="text" name="title" placeholder="New Category" class="form-control form-control-lg mr-2 @error('title') is-invalid  @enderror" value="{{ old('title', $category->title) }}" required>                        
                        <button class="btn btn-primary btn-lg">Update</button>
                    </div>
                    @error('title')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                    @enderror
                </form>

                @if(session('message'))
                    <p class="alert alert-success">
                        {{ session('message') }}
                    </p>
                @endif
                
                @include('category.list')

            </div>
        </div>
    </div>
</div>

@endsection