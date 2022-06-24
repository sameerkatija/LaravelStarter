@extends('layouts.app')
 
@section('title', 'Login to EasyCamp!')

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
                <img src="https://images.unsplash.com/photo-1571863533956-01c88e79957e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80" alt="" class="card-img-top" />
                <div class="card-body mb-3">
                <h5 class="card-title">Login</h5>

                 @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('email') }}
                        </div>
                @endif
                @if ($errors->has('password') and !($errors->has('email')))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('password') }}
                        </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                            {{  session('error') }}
                        </div>
                @endif
                
                <form action="{{ route('userlogin')}}" method="POST" class="validated-form" novalidate>
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" autofocus required>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <input type='submit' class="btn btn-success btn-block" name='Login' value='Login' />

                   
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection