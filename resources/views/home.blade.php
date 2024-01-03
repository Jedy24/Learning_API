@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 25vh;">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(0, 0, 0, 0.7);" >
                <div class="card-header" style="font-weight: bold; font-family: 'Apple Chancery, cursive'; font-size: 24px; color: white;">
                    {{ __('Status') }}
                </div>

                <div class="card-body" style="color: white;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
