@extends('layouts.public')

@section('content')
<div class="row justify-content-center">
  <div class="col-12">

    @foreach ($posts as $post)
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="https://www.linga.org/site/photos/Largnewsimages/image-not-found.png" class="img-fluid rounded-start" alt="..." style="max-height:150px;width: 100%; object-fit: cover">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ substr($post->content, 0, 80) }}</p>
            <p class="card-text"><small class="text-muted">{{ $post->updated_at }}</small></p>

            <a href="{{ route('posts.show', ['slug' => $post->slug ]) }}">Apri...</a>

          </div>
        </div>
      </div>
    </div>

    @endforeach

  </div>
</div>
@endsection
