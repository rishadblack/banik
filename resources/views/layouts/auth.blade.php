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
    <link href="{{ asset('backend/assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet">
    @livewireStyles

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border: 1px solid #5f5959;
        }

        .container {
            position: relative;
            display: flex;
            justify-content: center;
        }

        .input100 {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            line-height: 1.5;
            color: #666666;
            display: block;
            width: 100%;
            background: #ffffff;
            height: 50px;
            border-radius: 25px;
            padding: 0 30px 0 68px;
            border: 1px solid #aaa9b3;
        }

        input {
            outline: none;
            border: none;
        }

        button,
        input {
            overflow: visible;
        }

        .validate-input {
            position: relative;
        }

        .wrap-input100 {
            width: 100%;
            z-index: 1;
            margin-bottom: 10px;
        }

        .symbol-input100 {
            font-size: 15px;
            display: flex;
            align-items: center;
            position: absolute;
            border-radius: 25px;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding-left: 35px;
            pointer-events: none;
            color: #518bfc;
            transition: all 0.4s;
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
        <div>
            <h4>Banik BMS</h4>
            <br>
            <h5>Banik Business Management System</h5>
            <p class="text-muted version"> Version 1.0.0</p>
            <br><br>
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>


    <script src="{{ asset('backend/assets/js/vendor.min.js') }}?v={{ now() }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/app.min.js') }}?v={{ now() }}" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
