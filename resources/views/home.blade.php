@extends('layouts.main')

@section('contents')
    @if (session('added'))
        <p>{{ session('added') }}</p>
    @endif
    @foreach ($posts as $post)
        <div class="card" style="width: 18rem;">
            <img src="{{ $post->img ? asset("img/{$post->img}") : asset('img/no_photo.jpg') }}" class="card-img-top"
                alt="not found">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <i class="btn btn-primary rounded-pill btn-sm">{{ $post->category->name }}</i>
                <p class="card-text">{{ $post->discription }}</p>
                <a href="#" class="btn btn-primary">Просмотреть</a>

                <form action="{{ route('post.store') }}" class="d-inline-block" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    @if ($favourite->contains($post->id))
                        <input type="hidden" name="_method" value="delete" />
                        <button type="submit" class="btn btn-success remove-favourites d-inline-block">убрать
                            избранное</button>
                    @else
                        <button type="submit" class="btn btn-success add-favourites d-inline-block">В избранное</button>
                    @endif


                </form>
            </div>
        </div>
    @endforeach

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
@endsection
