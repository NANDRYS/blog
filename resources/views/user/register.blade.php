@extends('layouts.main')
@section('content')
    <div class=" d-flex justify-items-center align-items-center" style="height: 100vh">
        <form action="{{route('user.store')}}" method="POST" class="d-flex flex-column mx-auto justify-items-center align-items-center"
            style="width:33%; ">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
