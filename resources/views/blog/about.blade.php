@extends('blog.master')

@section('title') About @endsection

@section('contant')

<div class="mb-4 pb-4">
    <div class="py-5 my-5 text-center text-lg-start">
        <p class="fw-bold">Dear Viewer</p>
        <h1 class="fw-bold">
            <span class="text-primary">I'm Wai Yan Kyaw</span> 
            <br> 
            <span class="h4">Web Developer</span>
        </h1>
        <p>Please go back to Home Page</p>
        <a class="btn btn-outline-primary rounded-pill px-3" href="{{ route('index') }}">
            <i class="feather-home"></i>
            Blog Home
        </a>

    </div>
</div>

@endsection