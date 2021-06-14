@extends('Admin.layout')

@section('admin')

        <div class="p-3">
            <div class="text-center">
                <img class="img-fluid" src="{{ asset('img/logo.png') }}" width="100px" />
            </div>
            <br>
            <br>
            <h3 class="text-center" >Registration</h3>
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="john@doe.ex">
                </div>
                <button type="submit" name="register" class="btn btn-primary">Register</button>
            </form>
        </div>

@endsection