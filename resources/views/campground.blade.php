@extends('layouts.app')
 
@section('title', 'Campgrounds')

@section('navbar')
    @parent
    @include('partials.navbar')
 @endsection

@section('body')
    @parent
    
    <div class="container">
    <header class="container-fluid bg-dark text-light p-5 mt-5">
        <div class="container bg-dark p-5">
            <h1 class='display-4'>Welcome to EasyCamp!</h1>
            <p>The place to choose Best camps across the world.</p>
            <p>
                <a class="btn btn-primary" href="{{ route('newCampground')}}">Add New Campground</a>
            </p>
        </div>
    </header>
    <div>
        <div class='row'>
            
            @for($i = 0; $i < count($camps); $i++)
                <div class='col-md-3 col-sm-6 '>
                    <div class=" card mb-2">
                        <img class='img-thumbnail card-img-top' src="{{$camps[$i]["image"]}}"/>
                        <div class="card-body text-center">
                            <h4 class="card-title text-center">{{$camps[$i]['title']}}</h4>
                            <a href="/campground/{{$camps[$i]['id']}}" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            @endfor
            
        </div>
    </div>
</div>

@endsection
 