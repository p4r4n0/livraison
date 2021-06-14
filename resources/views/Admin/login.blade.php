@extends('Admin.layout')

@section('admin')
        <div class="p-3">
            <div class="text-center">
                <img class="img-fluid" src="{{ asset('img/logo.png') }}" width="100px" />
            </div>
            <br>
            <br>
            <h3 class="text-center" >Login</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf

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
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>

@endsection