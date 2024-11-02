@extends('layouts.main')
@section('content')
    <div class=" d-flex justify-items-center align-items-center" style="height: 100vh">
        @error('fuck')
            <p>{{ $message }}</p>
        @enderror
        <form action="{{ route('user.loginCheck') }}" method="POST"
            class="d-flex flex-column mx-auto justify-items-center align-items-center" style="width:33%; ">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control  @error('email') invalid     @enderror"
                    id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') invalid     @enderror"
                    value="{{ old('password') }}" id="exampleInputPassword1">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Войти в айти</button>
        </form>
    </div>
@endsection
