@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    {{ date('Y-m-d | h:i:s') }}
                    <br>
                    <br>
                    {{ env("App_Name") }}

                    <br>
                    <br>

                    {{ env("App_Dev") }}
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
