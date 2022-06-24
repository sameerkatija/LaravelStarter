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
    <form action="{{ route('editcampground', $camp['id'])}}" method="POST">
        {{ csrf_field() }}
      <div class="mb-3">
        <label class="form-label"  for="title">Title</label>
        <input class="form-control" type="text" id="title" name="title" value="{{htmlentities($camp['title'], ENT_QUOTES)}}" required>
      </div>
      <div class="mb-3">
        <label class="form-label" for="location">Location</label>
        <input class="form-control" type="text" id="location" name="location" value={{$camp['location']}} required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="price">Campground Price</label>
        <div class="input-group">
          <span class="input-group-text" id="price-label">PKR</span>
          <input type="text" class="form-control" id="price" placeholder="0.00" aria-label="price" aria-describedby="price-label" name="price" value={{$camp['price']}} required>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" type="text" id="description" name="description" required> {{$camp['description']}}</textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label" id="image">Images Link</label>
        <input class="form-control" type="text" for="image" name="image" value={{$camp['image']}}>
      </div>
      <div class="mb-3">
        <input type='submit' class="btn btn-success" value='Edit Campground' />
      </div>
    </form>
    <a href="{{ route('campground')}}">All Campgrounds</a>
  </div>
</div>
</div>
@endsection