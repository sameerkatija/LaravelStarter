@extends('layouts.app')
 
@section('title', 'Register')

@section('navbar')
    @parent
    @include('partials.navbar')
 @endsection

@section('body')
    @parent
    <div class="container d-flex justify-content-center align-items-center mt-5">
  <div class="row">
    <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4 mb-3">
      <div class="card shadow">
        <img src="https://images.unsplash.com/photo-1571863533956-01c88e79957e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80"
            alt="" class="card-img-top" />
        <div class="card-body">
          <h5 class="card-title">Register</h5>
            @if ($errors->has('username'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('username') }}
                        </div>
                @endif
            @if ($errors->has('email') and !($errors->has('username')))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('email') }}
                        </div>
                @endif
                @if ($errors->has('password') and !($errors->has('email')) and !($errors->has('username')))
                        <div class="alert alert-danger" role="alert">
                           {{ $errors->first('password') }}
                        </div>
                @endif
          <form action="{{ route('userregister')}}" method="POST" class="validated-form" novalidate>
              {{ csrf_field() }}
            <div class="mb-3">
              <label class="form-label" for="username">Username</label>
              <input class="form-control" type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
            </div>
            <div class="mb-3">
              <label class="form-label" for="email">Email</label>
              <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">Password</label>
              <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <input type='submit' class="btn btn-success btn-block" name='Register' value='Register' />
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection