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
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v1/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v1/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v1/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v1/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v1/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v1/css/main.css') }}">
    @livewireStyles

    <style>
        .card {
            border: 1px solid #5f5959;
        }

        .form-control {
            border: var(--bs-border-width) solid #96989c;
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
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('Login_v1/images/logo1.jpg') }}"
                        style="height: 200px; width=300px; margin-top:70px" alt="IMG">
                </div>
                <div class="login100-form validate-form">
                    <span class="login100-form-title">
                        @isset($title)
                            {{ $title }}
                        @endisset
                    </span>

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="{{ asset('Login_v1/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v1/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('Login_v1/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v1/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v1/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v1/js/main.js') }}"></script>
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
