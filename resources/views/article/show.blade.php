@extends("layouts.app")

@section('title') {{ $article->title }} @endsection

@section('head')
<style>
    .description{
        white-space: break-spaces;
    }
</style>
@endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
</x-breadcrumb>

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-0 text-primary">
                    {{ $article->title }}
                </h4>

                <div class="my-2">
                    <span class="mr-3 small">
                        <i class="feather-user text-info"></i>
                        {{ $article->user->name }}
                    </span>

                    <span class="mr-3 small">
                        <i class="feather-layers text-info"></i>
                        {{ $article->category->title }}
                    </span>

                    <i class="feather-clock text-warning"></i>
                    <span class="small">{{ $article->created_at->format("h:i A") }}</span>
                    <i class="feather-calendar text-warning"></i>
                    <span class="small">{{ $article->created_at->format("d-m-Y") }}</span>

                </div>

                <span class="text-black-50 description">{{ $article->description }}</span>

                <hr>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <form action="{{ route('article.destroy',[$article->id,'page'=>request()->page]) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" onclick="return confirm('Are U Sure to delete this article')">Delete</button>
                        </form>
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-primary">
                            Edit
                        </a>
                    </div>
                    <p class="mb-0">
                        {{ $article->created_at->diffForHumans() }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection