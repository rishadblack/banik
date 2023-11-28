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

                        @isset($title)
                            {{ $title }}
                        @endisset

                    {{ $slot }}



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
