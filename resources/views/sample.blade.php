@extends("layouts.app")

@section('title') Sample @endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Sample</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sample Page</li>
</x-breadcrumb>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">
                    <i class="feather-feather"></i>
                    Sample Page
                </h4>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non aperiam minus animi numquam quae deleniti quas cumque quam tempora!</p>

            </div>
        </div>
    </div>
</div>

@endsection