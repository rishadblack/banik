<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        @isset($title)
            {{ $title }} |
        @endisset
        {{ config('app.name') }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta
        content="@isset($title)
    {{ $title }} |
    @endisset
    {{ config('app.name') }}"
        name="description" content>
    <meta name="author" content="{{ config('app.name') }}" content>
    <link rel="icon" type="image/png" href="{{ asset('auth/images/icons/favicon.icon')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css')}}">
    @livewireStyles

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border: 1px solid #5f5959;
        }

        .form-control {
            border: 2px solid #9b98a6;
            padding: 0.575rem .75rem;
        }

        .container-login100 {
            background-size: cover;
            background-image: url({{ asset('Login_v1/images/logo2.jpg') }});
        }

        .login100-pic {
            width: 316px;
            padding-left: 70px;
        }
    </style>
    @vite(['resources/sass/auth.scss', 'resources/js/auth.js'])
    @stack('css')
</head>

<body>

    @isset($title)
        {{ $title }}
    @endisset
    <div class="container text-center">
        <h4>Banik BMS</h4>
        <br>
        <h5>Banik Business Management System</h5>
        <p class="text-muted version"> Version 1.0.0</p>
        <br><br>
        <div>
            {{ $slot }}
        </div>
    </div>


    <script src="{{ asset('auth/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{ asset('auth/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth/vendor/tilt/tilt.jquery.min.js')}}"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" type="text/javascript"></script>
    @livewireScripts
    <x-livewire-alert::scripts />
    <script>
        function extend(obj, ext) {
            Object.keys(ext).forEach(function(key) {
                obj[key] = ext[key];
            });
            return obj;
        }

        $(document).on('click', '.modalOpen', function() {
            Livewire.dispatch($(this).data('modal'), {
                data: $(this).data()
            })
        });

        window.addEventListener('modalOpen', event => {
            new window.bootstrap.Modal(document.getElementById(event.detail), {
                backdrop: false
            }).toggle();
        });

        window.addEventListener('modalClose', event => {
            new window.bootstrap.Modal(document.getElementById(event.detail), {
                backdrop: false
            }).hide();
        });

        window.addEventListener('callEventFunc', event => {
            Livewire.dispatch(event.detail.callName, {
                data: event.detail
            })
        });

        $(document).on('click', '.callEvent', function() {
            Livewire.dispatch($(this).data('listener'), {
                data: $(this).data()
            });
        });
    </script>
    @stack('js')
</body>

</html>
