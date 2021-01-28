@extends('layouts.main')
@section('content')
    <div class="card mx-auto mt-3 bg-dark" style="width: 40%">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" 
                           class="form-control" 
                           name="username"
                           placeholder="Enter your username">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" 
                           class="form-control" 
                           type="email" 
                           name="email"
                           placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" 
                           class="form-control" 
                           type="password" 
                           name="password"
                           placeholder="Make a password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Again password</label>
                    <input id="password_confirmation" 
                           class="form-control" 
                           type="password" 
                           name="password_confirmation"
                           placeholder="Repeat your password">
                </div>


                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                      <label class="form-check-label" for="remember_me">
                        Remember me
                      </label>
                    </div>
                </div>
                <div class="float-right"><button class="btn btn-primary" type="submit">Register</button><div>
            </form>
        </div>
    </div>
@endsection