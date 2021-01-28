@extends('layouts.main')
@section('content')
    <div class="card mx-auto mt-3 bg-dark" style="width: 40%">
        <div class="card-body >
            <form method="POST" action="{{ route('login') }}">
                @csrf
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
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                      <label class="form-check-label" for="remember_me">
                        Remember me
                      </label>
                    </div>
                </div>
                <div class="float-right"><button class="btn btn-primary" type="submit">Login</button><div>
            </form>
        </div>
    </div>
@endsection