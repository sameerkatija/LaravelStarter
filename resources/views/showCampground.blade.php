@extends('layouts.app')
 
@section('title', 'Campgrounds')

@section('navbar')
    @parent
    @include('partials.navbar')
 @endsection

@section('body')
    @parent

    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card m-auto">
                <img class="card-img img-thumbnail img-fluid" src="{{$camp["image"]}}" alt="">
                <div class="card-body">
                    <h1 class='card-title'>{{ $camp['title'] }}</h1>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">$ / Night</span>
                        </div>
                        <h4 class='form-control'>{{$camp["price"]}}</h4>
                    </div>
                    <label>Description:</label>
                    <p class="card-text">{{ $camp['description'] }}</p>
                    <p><em>Submitted by {{$username['username']}} </em></p>
                    @if(Session()->get('Login_id') == $camp['userid'])
                    <a class="btn btn-warning" href="{{route('editcamppage', $camp['id'])}}">Edit Camp</a>
                    <a class="btn btn-danger" href="{{route('deletecamp',[$camp['id']])}}">Delete Camp</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


