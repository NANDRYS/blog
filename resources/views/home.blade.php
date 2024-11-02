@extends('layouts.main')

@section('contents')
    @foreach ($posts as $card)
        <div data-id="{{ $card->id }}" class="card" style="width: 18rem;">
            <img src="{{ $card->img ? asset("img/{$card->img}") : asset('img/no_photo.jpg') }}" class="card-img-top"
                alt="not found">
            <div class="card-body">
                <h5 class="card-title">{{ $card->title }}</h5>
                <i class="btn btn-primary rounded-pill btn-sm">{{ $card->category->name }}</i>
                <p class="card-text">{{ $card->discription }}</p>
                <a href="#" class="btn btn-primary">Просмотреть</a>
                <a href="#" class="btn btn-success add-favourites">В избранное</a>

            </div>
        </div>
    @endforeach

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
@endsection
