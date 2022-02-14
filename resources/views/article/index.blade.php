@extends("layouts.app")

@section('title') Article List @endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Article List</li>
</x-breadcrumb>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">
                    <i class="feather-list"></i>
                    Article List
                </h4>
                <hr>

                <div class="d-flex justify-content-between">
                    <div class="">
                        <a href="{{ route('article.create') }}" class="btn btn-lg btn-outline-primary">
                            <i class="feather-plus-circle"></i>
                            Create Article
                        </a>
                        @isset(request()->search)
                            <a href="{{ route('article.index') }}" class="btn btn-lg btn-outline-secondary mb-0 mr-5">
                                <i class="feather-list"></i>
                                All Article
                            </a>
                            <span class="mb-0 h4 font-weight-bold">Search By : " {{ request()->search }} "</span>
                        @endisset
                    </div>

                    

                    <form action="{{ route('article.index') }}" class="mb-3">
                        <div class="form-inline">
                            <input type="text" name="search" placeholder="Search Article" class="form-control form-control-lg mr-2" value="{{ request()->search ? request()->search : '' }}" required>
                            <button class="btn btn-primary btn-lg">
                                <i class="feather-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                @if(session('message'))
                    <p class="alert alert-success">
                        {{ session('message') }}
                    </p>
                @endif
                @if(session('deleteMessage'))
                    <p class="alert alert-danger">
                        {{ session('deleteMessage') }}
                    </p>
                @endif

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Category</th>
                            <th>Owner</th>
                            <th>Control</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>
                                <span class="font-weight-bold">
                                    {{ Str::words($article->title, 5) }}
                                </span>
                                <br>
                                <small class="text-black-50">
                                    {{ Str::words($article->description, 10) }}
                                </small>
                            </td>
                            <td>{{ $article->category->title }}</td>
                            <td>{{ $article->user->name }}</td>
                            <td>
                                <a href="{{ route('article.show', $article->id) }}" class="btn btn-outline-success">
                                    Show
                                </a>
                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-primary">
                                    Edit
                                </a>
                                <form action="{{ route('article.destroy',[$article->id, 'page'=>request()->page]) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are U Sure to delete this article ?')">Delete</button>
                                </form>
                            </td>
                            <td>
                                <i class="feather-calendar"></i>
                                <span class="small">{{ $article->created_at->format("d-m-Y") }}</span>
                                <br>
                                <i class="feather-clock"></i>
                                <span class="small">{{ $article->created_at->format("h:i A") }}</span>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-5">There is no Articles</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-between">
                    {{ $articles->appends(request()->all())->links() }}
                    <p class="font-weight-bold h4 mb-0">Total : {{ $articles->total() }} </p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection