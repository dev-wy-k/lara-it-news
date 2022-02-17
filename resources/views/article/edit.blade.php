@extends("layouts.app")

@section('title') Edit Article @endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
</x-breadcrumb>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">
                    <i class="feather-edit-3"></i>
                    Edit Article
                </h4>

                <form action="{{ route('article.update', $article->id) }}" id="updateArticle" method="post">
                    @csrf
                    @method("put")
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3">
        <div class="card mt-3">
            <div class="card-body">
                <div class="form-group mb-0">
                    <label>Select Category</label>
                    <select name="category" form="updateArticle" class="custom-select custom-select-lg @error('category') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category', $article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card mt-3">
            <div class="card-body">
                <div class="form-group mb-0">

                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" id="title" form="updateArticle" name="title" value="{{ old('title', $article->title) }}" class="form-control form-control-lg @error('title') is-invalid @enderror">
                        @error('title')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Article Descripton</label>
                        <textarea name="description" form="updateArticle" id="description" rows="15" class="form-control form-control-lg  @error('description') is-invalid @enderror">{{ old('description', $article->description) }}</textarea>
                        @error('description')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3">
        <div class="card mt-3">
            <div class="card-body">
                <div class="form-group mb-0">
                    <button class="btn btn-primary w-100" form="updateArticle">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection