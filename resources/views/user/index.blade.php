@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 30vh;">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(0, 0, 0, 0.7);" >
                    <div class="card-header" style="font-weight: bold; font-family: 'Apple Chancery, cursive'; font-size: 24px; color: white;">
                        User Data
                    </div>

                    <div class="card-body" style="color: white;">
                        <div class="row">
                            <div class="col-md-4">Name:</div>
                            <div class="col-md-8">{{ $user->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-8">{{ $user->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Phone Number:</div>
                            <div class="col-md-8">{{ $user->phone_number }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Date of Birth:</div>
                            <div class="col-md-8">{{ $user->date_of_birth }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
