@extends('layouts.log')


@section('container')
    <div class="shadow d-flex flex-column justify-content-center w-100 d-flex align-items-center bg-light  "
        style="width: 100%; height:100vh">
        <div class="col-lg-3 col-sm-4 p-4 bg-dark rounded-5 shadow">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('logOut'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('logOut') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/login" method="POST" class="form login">
                @csrf
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="align-items-center d-flex flex-column bg-light fw-bold rounded-4 fs-4 p-3">
                        <span class="material-symbols-outlined">
                            login
                        </span>
                        <div class="bg-light fw-bold  rounded-2 fs-4">Sign-in</div>
                    </div>
                </div>
                <div class="d-flex bg-light text-dark rounded-3 my-2">
                    <span class="input-group-text fs-4" id="basic-addon1"><span class="material-symbols-outlined">
                            person
                        </span></span>
                    <div class="col form-floating">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="name@example.com" value="" autofocus>
                        <label for="name">Username</label>
                    </div>
                </div>
                <div class="d-flex bg-light text-dark rounded-3 my-2">
                    <span class="input-group-text fs-4" id="basic-addon1"><span class="material-symbols-outlined">
                        lock
                        </span></span>
                    <div class="col form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="name@example.com" value="">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="mt-4 mb-2">
                    <div class="justify-content-center d-flex align-items-center">
                        <input class="btn d-flex rounded-3 w-100 bg-primary fw-bold" type="submit" value="Login">
                    </div>
                </div>
            </form>
            <div class="mt-4 mb-2">
                
            </div>
            <div class="mt-4 mb-2">
                <div class="d-flex justify-content-end d-flex align-items-center">
                    <a href="/" class="nav-link text-primary d-flex align-items-center">Go back <span
                            class="material-symbols-outlined">
                            chevron_right
                        </span></a>
                </div>
            </div>
        </div>
    </div>
@endsection






{{-- <form action="https://httpbin.org/post" method="POST" class="form login">

            <div class="form__field">
                <label for="login__username"><svg class="icon">
                        <use xlink:href="#icon-user"></use>
                    </svg><span class="hidden">Username</span></label>
                <input autocomplete="username" id="login__username" type="text" name="username" class="form__input"
                    placeholder="Username">
            </div>

            <div class="form__field">
                <label for="login__password"><svg class="icon">
                        <use xlink:href="#icon-lock"></use>
                    </svg><span class="hidden">Password</span></label>
                <input id="login__password" type="password" name="password" class="form__input" placeholder="Password">
            </div>

            <div class="form__field">
                <input type="submit" value="Sign In">
            </div>

        </form> --}}

{{-- <p class="text--center">Not a member? <a href="#">Sign up now</a> <svg class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg></p> --}}
