@extends('layouts.base')
 
@section('content')

<div class="content-box big-box">
  <div>
    <h2>Create Anime</h2>
  </div>

  @if ($errors->all())
  <div class="alert alert-danger">
    <ul class="parsley-errors-list filled">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form id="form_anime" class="" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
      <label>Synopsis</label>
      <input type="date" class="form-control" name="start_date">
    </div>

    <div class="form-group">
      <label>Season</label>
      <select class="form-control" name="season" id="season">
        <option>Select a season</option>
        @foreach($seasons as $season)
        <option value= {{$season->id}} {{ (old($season->id) == $season->id) ? 'selected' : '' }}>{{$season->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>Anime Genres</label>
      @foreach($anime_genres as $anime_genre)
      <div class="checkbox checkbox-primary">
        <label>
          <input type="checkbox" name="anime_genre[]" value= {{ $anime_genre->id }} >
          <i></i>
          {{ $anime_genre->name }}
        </label>
      </div>
      @endforeach
    </div>

    <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i>
      <span>Register</span>
    </button>

    </form>
</div>
@endsection