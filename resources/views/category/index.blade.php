@extends("layouts.app")

@section('title') Category Manager @endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Category List</li>
</x-breadcrumb>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">
                    <i class="feather-layers"></i>
                    Category List
                </h4>
                <hr>                

                <form action="{{ route('category.store') }}" class="mb-3" method="post">
                    @csrf
                    <div class="form-inline">
                        <input type="text" name="title" placeholder="New Category" class="form-control form-control-lg mr-2 @error('title') is-invalid  @enderror" value="{{ old('title') }}" required>                        
                        <button class="btn btn-primary btn-lg">Add Category</button>
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
                @if(session('delMessage'))
                    <p class="alert alert-danger">
                        {{ session('delMessage') }}
                    </p>
                @endif

                @include('category.list')

            </div>
        </div>
    </div>
</div>

@endsection