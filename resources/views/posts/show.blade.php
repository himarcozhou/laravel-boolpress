@extends('layouts.public')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
          <h1>{{ $post->title }}</h1>
          {{ $post->updated_at }} | {{ $post->slug }} | {{ $post->category ? $post->category->name : '-' }}
        </div>

        <a href="{{ route('posts.index') }}" class="btn btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
            <line x1="20" y1="12" x2="4" y2="12"></line>
            <polyline points="10 18 4 12 10 6"></polyline>
          </svg> Tutti i posts
        </a>
      </div>

      <p class="lead">{{ $post->content }}</p>

      <p>Scritto da {{ $post->user->name }}</p>
    </div>
  </div>
</div>
@endsection
