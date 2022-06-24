
@extends('partials.header')
@section('link')
    @parent
    <link rel="stylesheet" href="{{ URL::asset('css/landing.css') }}">
@endsection

@section('title', 'Welcome to EasyCamp!')
 
    <div class="container">
    </div>

    <div id="landing-header">
        <h1>Welcome to EasyCamp!</h1>
        <a href="/campground" class="btn btn-lg btn-success">View All Campgrounds</a>
    </div>

    <ul class="slideshow">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</body>
</html>