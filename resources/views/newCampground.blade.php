@extends('layouts.app')
 
@section('title', 'Add New Campground')

@section('navbar')
    @parent
    @include('partials.navbar')
 @endsection

@section('body')
    @parent
<div class="container mt-5 mb-3">
<div class="row">
  <h1 class="text-center">New Campground</h1>
  @if ($errors->has('title'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->first('title') }}
    </div>
  @elseif ($errors->has('location'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->first('location') }}
    </div>
  @elseif ($errors->has('price'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->first('price') }}
    </div>
  @elseif ($errors->has('description'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->first('description') }}
    </div>
  @elseif ($errors->has('image'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->first('image') }}
    </div>
  @endif
  <div class="col-6 offset-3">
    <form action="{{ route('savecampground')}}" method="POST" novalidate class="validaded-form">
        {{ csrf_field() }}
      <div class="mb-3">
        <label class="form-label"  for="title">Title</label>
        <input class="form-control" type="text" id="title" name="title" required>
      </div>
      <div class="mb-3">
        <label class="form-label" for="location">Location</label>
        <input class="form-control" type="text" id="location" name="location" required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="price">Campground Price</label>
        <div class="input-group">
          <span class="input-group-text" id="price-label">PKR</span>
          <input type="text" class="form-control" id="price" placeholder="0.00" aria-label="price" aria-describedby="price-label" name="price" required>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" type="text" id="description" name="description" required></textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label" id="image">Images Link</label>
        <input class="form-control" type="text" for="image" name="image" multiple>
      </div>
      <div class="mb-3">
        <input type='submit' class="btn btn-success" value='Add Campground' />
      </div>
    </form>
    <a href="{{ route('campground')}}">All Campgrounds</a>
  </div>
</div>
</div>
@endsection