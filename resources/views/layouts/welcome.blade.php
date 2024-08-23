<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Desa Giti</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Styles -->
    <style>
        @import url("https://fonts.googleapis.com/css?family=Outfit:700|Poppins:400");

        :root {
            --text: hsl(0, 0%, 0%);
            --text_muted: hsla(0, 0%, 17%, 0.5);
            --border: hsla(0, 0%, 89%, 0.2);
            --background: hsl(0, 0%, 100%);
            --primary: hsl(243, 86%, 83%);
            --primary_dim: hsla(243, 86%, 83%, 1);
            --secondary: hsla(113, 100%, 50%, 0.5);
            --accent: hsl(198, 100%, 84%);
            --accent_dim: hsla(198, 100%, 84%, 1);
        }

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            overflow-x: hidden;
            font-family: "Poppins";
            font-weight: 400;
            color: var(--text);
            padding: 0 12vw 2rem 12vw;
            gap: 2rem;
            background: var(--background);
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Outfit";
            font-weight: 700;
            color: var(--text);
        }

        html {
            font-size: 100%;
        }

        /* 16px */

        h1 {
            font-size: 4.21rem;
            /* 67.36px */
        }

        h2 {
            font-size: 3.158rem;
            /* 50.56px */
        }

        h3 {
            font-size: 2.369rem;
            /* 37.92px */
        }

        h4 {
            font-size: 1.777rem;
            /* 28.48px */
        }

        h5 {
            font-size: 1.333rem;
            /* 21.28px */
        }

        small {
            font-size: 0.75rem;
            /* 12px */
        }

        p,
        a {
            font-size: 0.9rem;
        }

        a:hover {
            color: var(--primary);
        }

        span {
            color: var(--text);
        }

        tag {
            border-radius: 1rem;
            padding: 0.3rem 0.8rem 0.3rem 0.8rem;
            font-size: 0.75rem;
            display: inline-block;
            color: var(--text);
            vertical-align: middle;
        }

        svg {
            fill: var(--text);
            height: 1lh;
            width: 1lh;
            vertical-align: middle;
        }

        svg.small {
            font-size: 0.8rem;
            fill: var(--text_muted);
            transition: 0.2s ease-in-out;
        }

        svg.small:hover {
            fill: var(--accent);
            transform: scale(1.1);
        }

        button {
            color: var(--text);
            border-radius: 0.5rem;
            border: none;
            background: none;
            font-size: 0.9rem;
            padding: 0.75rem 1rem 0.75rem 1rem;
        }

        a,
        button {
            cursor: pointer;
        }

        button svg {
            vertical-align: middle;
        }

        .banner img {
            width: 100%;
            object-fit: cover;
            height: 75vh;
            -webkit-mask-image: linear-gradient(rgba(0, 0, 0, 1) 2%,
                    rgba(0, 0, 0, 0) 98%);
        }

        .banner {
            width: 100%;
            height: 75vh;
            position: relative;
        }

        .overlay {
            position: absolute;
            padding: 1rem;
        }

        .left {
            bottom: 8px;
            left: 16px;
        }

        .right {
            bottom: 8px;
            right: 16px;
        }

        .bottom {
            right: 50%;
            bottom: 8px;
        }

        input {
            border-radius: 1.5rem;
            border: none;
            padding: 1rem 2rem 1rem 2rem;
            color: var(--text);
            outline: none;
            font-size: 0.9rem;
        }

        nav {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 0 2rem 0;
        }

        footer {
            margin-top: 2rem;
        }

        .container {
            flex-grow: 1;
            padding: 2rem;
            border-radius: 0.7rem;
        }

        .space-between {
            justify-content: space-between;
        }

        .column {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .center {
            align-items: center;
            align-self: center;
        }

        .primary {
            background: linear-gradient(114deg, var(--primary_dim), var(--accent_dim));
            color: var(--background);
        }

        .secondary {
            border: solid 1px var(--secondary);
            background: var(--secondary);
        }

        .tertiary {
            border: solid 3px var(--border);
        }

        .muted {
            color: var(--text_muted);
        }

        .bold {
            font-weight: 700;
        }

        .underline {
            text-decoration: underline;
        }

        .logo {
            fill: var(--text);
            stroke-width: 0;
        }

        .plugins {
            display: flex;
            flex: 1 0 50%;
            flex-wrap: wrap;
            width: 100%;
            gap: 2rem;
        }

        .mobile {
            display: none;
        }

        .custom-bg {
            position: relative;
            background-size: cover;
            background-position: center;
            transition: transform 0.4s ease;
        }

        .custom-bg:hover {
            transform: scale(1.05);
        }

        .overlay {
            position: absolute;
            background-color: rgba(0, 0, 0, 0);
            color: #fff;
            padding: 20px;
            transition: background-color 0.4s ease;
        }

        .overlay:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .potgam {
            padding-inline: 250px;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 2;
            top: 0;
            left: 0;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar .nav-link {
            margin-bottom: 20px;
            padding: 8px 8px 8px 8px;
            text-decoration: none;
            font-size: 20px;
            display: block;
            transition: 0.3s;
            border-left: 5px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            margin-top: 30px;
            right: 0;
            margin-right: 30px;
        }

        .accname {
            display: block;
        }

        @media only screen and (max-width: 650px) {
            .no-mobile {
                display: none;
            }

            .mobile {
                display: block;
            }

            body {
                padding: 0 10vw 5vh 10vw;
            }

            .sidebar {
                padding-top: 60px;
            }

            .sidebar a {
                font-size: 18px;
            }

            .potgam {
                padding-inline: 0px;
            }
        }
    </style>
    <script>
        var counter = document.getElementById("counter");

        const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay));

        var min = 436082;
        var max = 450000;

        async function run() {
            while (min < max) {
                await sleep(Math.floor(Math.random() * 1500));
                min += Math.floor(Math.random() * 10);
                counter.textContent = new Intl.NumberFormat("en-US").format(min);
                console.log(counter.textContent);
            }
        }

        run();
    </script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <nav>
        <div class="nav gap-2">
            <button href="/">
                <h5>Desa Giti</h5>
    </button>
        </div>
        <div class="nav gap-3 muted no-mobile">
            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                href="/">Beranda</a>
            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                href="/#berita">Berita</a>
            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                href="/#potensi">Potensi Desa</a>
            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                href="/#sarana">Sarana Desa</a>
            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                href="/#kontak">Kontak</a>
        </div>
        @auth
        <form class="nav gap-2 no-mobile" action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item d-flex"><span class="pe-2 fw-bold material-symbols-outlined">
                logout
            </span><h5>Log out</h5></button>
        </form>
        @else
            <a class="nav gap-2 no-mobile" href="/login">
            <span class="fw-bold material-symbols-outlined">
                login
            </span>
            </a>
        @endauth
        
        <script>
            function openNav() {
                document.getElementById("sidebar").style.width = "40vh";
            }

            function closeNav() {
                document.getElementById("sidebar").style.width = "0";
            }
        </script>

        <div onclick="openNav()" class="nav mobile">
        <span class="fw-bold material-symbols-outlined">
menu
</span>
        </div>
    </nav>
    <div class="sidebar bg-dark " id="sidebar">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
            <a href="javascript:void(0)" class="closebtn link-secondary link-underline-opacity-25"
                onclick="closeNav()"><span class="text-white material-symbols-outlined">
                    close
                </span></a>
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Desa Giti</span>
            </a>

            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="/#berita" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Berita
                    </a>
                </li>
                <li>
                    <a href="/#potensi" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#table" />
                        </svg>
                        Potensi Desa
                    </a>
                </li>
                <li>
                    <a href="/#sarana" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Sarana Desa
                    </a>
                </li>
                <li>
                    <a href="/#kontak" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#people-circle" />
                        </svg>
                        Kontak
                    </a>
                </li>
            </ul>
            <hr>
            @auth
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>{{auth()->user()->name}}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

                <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Log out</button>
                        </form>
                </ul>
            </div>
            @else
            <a class="ps-5 fs-5  text-white d-flex align-items-center text-white text-decoration-none" href="/login">
            
            Login
            </a>
            @endauth
        </div>
    </div>

    @yield('container')

    
    @include('home.kontak')
</body>

</html>
