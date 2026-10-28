<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Central Library Management System')
    </title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }

        .navbar {
            background: #212529;
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 1px;
        }

        .navbar a {
            color: white !important;
        }

        .main-content {
            padding: 30px;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">

        <div class="container-fluid">

            <a class="navbar-brand" href="{{ url('/') }}">
                Central Library Management System
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarContent">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarContent">

                <ul class="navbar-nav ms-auto">

                    @auth

                    <li class="nav-item">
                        @auth

                        <a class="nav-link"
                            href="{{ auth()->user()->role === 'admin'
                ? route('admin.dashboard')
                : route('members.dashboard') }}">
                            Dashboard
                        </a>

                    </li>
                    @if(auth()->user()->role === 'member')

                    <li class="nav-item">
                        <a class="nav-link"
                            href="#">
                            Borrowing History
                        </a>
                    </li>

                    @endif

                    @endauth


                    <li class="nav-item">
                        <span class="nav-link">
                            {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">

                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-link nav-link">
                                Logout
                            </button>

                        </form>

                    </li>

                    @else

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('register') }}">
                            Register
                        </a>
                    </li>

                    @endauth

                </ul>

            </div>

        </div>

    </nav>


    {{-- Main Content --}}
    <main class="main-content">

        @yield('content')

    </main>


    {{-- Bootstrap JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>