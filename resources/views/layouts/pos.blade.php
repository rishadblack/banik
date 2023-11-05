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

    <link href="{{ asset('backend/assets/plugins/summernote/dist/summernote-lite.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/blueimp-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet">

    <style>
        .pace-top,
        .pos-menu {
            margin-top: 10px;
        }

        .menuSearch {
            margin: 30px 0;
        }
        .closeBtn {
            float: left;
            margin-left: 150px;
        }
    </style>

    @livewireStyles
    @stack('css')
</head>

<body>




    <div class="pace-top">
        <div id="app" class="app app-content-full-height app-without-sidebar app-without-header">

            <div id="content" class="app-content p-0">

                <div class="pos pos-with-menu pos-with-sidebar" id="pos">
                    <div class="pos-container">

                        <div class="pos-menu">

                            <div class="logo">
                                <a href="index.html">
                                    <div class="logo-img"><i class="fa fa-bowl-rice"></i></div>
                                    <div class="logo-text">Pine & Dine</div>
                                </a>
                            </div>


                            <div class="nav-container">
                                <div class="h-100" data-scrollbar="true" data-skip-mobile="true">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#" data-filter="all">
                                                <i class="fa fa-fw fa-utensils"></i> All Dishes
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-filter="meat">
                                                <i class="fa fa-fw fa-drumstick-bite"></i> Meat
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-filter="burger">
                                                <i class="fa fa-fw fa-hamburger"></i> Burger
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-filter="pizza">
                                                <i class="fa fa-fw fa-pizza-slice"></i> Pizza
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-filter="drinks">
                                                <i class="fa fa-fw fa-cocktail"></i> Drinks
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-filter="desserts">
                                                <i class="fa fa-fw fa-ice-cream"></i> Desserts
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-filter="snacks">
                                                <i class="fa fa-fw fa-cookie-bite"></i> Snacks
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        {{ $slot }}

                    </div>
                </div>


                <a href="#" class="pos-mobile-sidebar-toggler" data-toggle-class="pos-mobile-sidebar-toggled"
                    data-toggle-target="#pos">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="badge">5</span>
                </a>

            </div>


            <div class="theme-panel">
                <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i
                        class="fa fa-cog"></i></a>
                <div class="theme-panel-content">
                    <ul class="theme-list clearfix">
                        <li><a href="javascript:;" class="bg-red" data-theme="theme-red" data-click="theme-selector"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                data-bs-title="Red" data-original-title title>&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-pink" data-theme="theme-pink"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Pink" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-orange" data-theme="theme-orange"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Orange" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-yellow" data-theme="theme-yellow"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Yellow" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-lime" data-theme="theme-lime"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Lime" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-green" data-theme="theme-green"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Green" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-teal" data-theme="theme-teal"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Teal" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-cyan" data-theme="theme-cyan"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Aqua" data-original-title title>&nbsp;</a>
                        </li>
                        <li class="active"><a href="javascript:;" class="bg-blue" data-theme
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Default" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-purple" data-theme="theme-purple"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Purple" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-indigo" data-theme="theme-indigo"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Indigo" data-original-title title>&nbsp;</a>
                        </li>
                        <li><a href="javascript:;" class="bg-gray-600" data-theme="theme-gray-600"
                                data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-container="body" data-bs-title="Gray" data-original-title title>&nbsp;</a>
                        </li>
                    </ul>
                    <hr class="mb-0">
                    <div class="row mt-10px pt-3px">
                        <div class="col-9 control-label text-body-emphasis fw-bold">
                            <div>Dark Mode <span
                                    class="badge bg-theme text-theme-color ms-1 position-relative py-4px px-6px"
                                    style="top: -1px">NEW</span></div>
                            <div class="lh-sm fs-13px fw-semibold">
                                <small class="text-body-emphasis opacity-50">
                                    Adjust the appearance to reduce glare and give your eyes a break.
                                </small>
                            </div>
                        </div>
                        <div class="col-3 d-flex">
                            <div class="form-check form-switch ms-auto mb-0 mt-2px">
                                <input type="checkbox" class="form-check-input" name="app-theme-dark-mode"
                                    id="appThemeDarkMode" value="1">
                                <label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

        </div>


        <div class="modal modal-pos fade" id="modalPosItem">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-0">
                    <a href="#" data-bs-dismiss="modal"
                        class="btn-close position-absolute top-0 end-0 m-4"></a>
                    <div class="modal-pos-product">
                        <div class="modal-pos-product-img">
                            <div class="img"
                                style="background-image: url({{ asset('backend/assets/img/pos/product-1.jpg') }})">
                            </div>
                        </div>
                        <div class="modal-pos-product-info">
                            <div class="fs-4 fw-semibold">Grill Chicken Chop</div>
                            <div class="text-body text-opacity-50 mb-2">
                                chicken, egg, mushroom, salad
                            </div>
                            <div class="fs-3 fw-bold mb-3">$10.99</div>
                            <div class="d-flex mb-3">
                                <a href="#" class="btn btn-secondary"><i class="fa fa-minus"></i></a>
                                <input type="text" class="form-control w-50px fw-bold mx-2 text-center"
                                    name="qty" value="1">
                                <a href="#" class="btn btn-secondary"><i class="fa fa-plus"></i></a>
                            </div>
                            <hr class="opacity-1">
                            <div class="mb-2">
                                <div class="fw-bold">Size:</div>
                                <div class="option-list">
                                    <div class="option">
                                        <input type="radio" id="size3" name="size" class="option-input"
                                            checked>
                                        <label class="option-label" for="size3">
                                            <span class="option-text">Small</span>
                                            <span class="option-price">+0.00</span>
                                        </label>
                                    </div>
                                    <div class="option">
                                        <input type="radio" id="size1" name="size" class="option-input">
                                        <label class="option-label" for="size1">
                                            <span class="option-text">Large</span>
                                            <span class="option-price">+3.00</span>
                                        </label>
                                    </div>
                                    <div class="option">
                                        <input type="radio" id="size2" name="size" class="option-input">
                                        <label class="option-label" for="size2">
                                            <span class="option-text">Medium</span>
                                            <span class="option-price">+1.50</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="fw-bold">Add On:</div>
                                <div class="option-list">
                                    <div class="option">
                                        <input type="checkbox" name="addon[sos]" value="true" class="option-input"
                                            id="addon1">
                                        <label class="option-label" for="addon1">
                                            <span class="option-text">More BBQ sos</span>
                                            <span class="option-price">+0.00</span>
                                        </label>
                                    </div>
                                    <div class="option">
                                        <input type="checkbox" name="addon[ff]" value="true" class="option-input"
                                            id="addon2">
                                        <label class="option-label" for="addon2">
                                            <span class="option-text">Extra french fries</span>
                                            <span class="option-price">+1.00</span>
                                        </label>
                                    </div>
                                    <div class="option">
                                        <input type="checkbox" name="addon[ms]" value="true" class="option-input"
                                            id="addon3">
                                        <label class="option-label" for="addon3">
                                            <span class="option-text">Mushroom soup</span>
                                            <span class="option-price">+3.50</span>
                                        </label>
                                    </div>
                                    <div class="option">
                                        <input type="checkbox" name="addon[ms]" value="true" class="option-input"
                                            id="addon4">
                                        <label class="option-label" for="addon4">
                                            <span class="option-text">Lemon Juice (set)</span>
                                            <span class="option-price">+2.50</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="opacity-1">
                            <div class="row">
                                <div class="col-4">
                                    <a href="#" class="btn btn-default fw-semibold mb-0 d-block py-3"
                                        data-bs-dismiss="modal">Cancel</a>
                                </div>
                                <div class="col-8">
                                    <a href="#"
                                        class="btn btn-theme fw-semibold d-flex justify-content-center align-items-center py-3 m-0">Add
                                        to cart <i class="fa fa-plus ms-2 my-n3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script data-cfasync="false"
        src="{{ asset('backend/assets/js/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload">
                <td>
                    <span class="preview d-flex justify-content-center flex-align-center" style="height: 80px"></span>
                </td>
                <td>
                    <p class="name mb-1">{%=file.name%}</p>
                    <strong class="error text-danger"></strong>
                </td>
                <td>
                    <p class="size mb-2">Processing...</p>
                    <div class="progress progress-sm mb-0 h-10px progress-striped active"><div class="progress-bar bg-theme" style="min-width: 2em; width:0%;"></div></div>
                </td>
                <td nowrap>
                    {% if (!i && !o.options.autoUpload) { %}
                        <button class="btn btn-theme btn-sm d-block w-100 start" disabled>
                            <span>Start</span>
                        </button>
                    {% } %}
                    {% if (!i) { %}
                        <button class="btn btn-default btn-sm d-block w-100 cancel mt-2">
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
        </script>


    <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download">
                <td>
                    <span class="preview d-flex justify-content-center flex-align-center" style="height: 80px">
                        {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                    </span>
                </td>
                <td>
                    <p class="name">
                        {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                            <span>{%=file.name%}</span>
                        {% } %}
                    </p>
                    {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td nowrap>
                    {% if (file.deleteUrl) { %}
                        <button class="btn btn-outline-danger btn-sm btn-block delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <span>Delete</span>
                        </button>
                        <div class="form-check mt-2">
                            <input type="checkbox" id="{%=file.deleteUrl%}" name="delete" value="1" class="form-check-input toggle">
                            <label for="{%=file.deleteUrl%}" class="form-check-label"></label>
                        </div>
                    {% } else { %}
                        <button class="btn btn-default btn-sm d-block w-100 cancel">
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
        </script>


    <script src="{{asset('backend/assets/js/vendor.min.js')}}" type="664157f6441cb17f9c2ca824-text/javascript"></script>
    <script src="{{asset('backend/assets/js/app.min.js')}}" type="664157f6441cb17f9c2ca824-text/javascript"></script>


    <script src="{{asset('backend/assets/plugins/apexcharts/dist/apexcharts.min.js')}}"
		type="664157f6441cb17f9c2ca824-text/javascript"></script>
    <script src="{{asset('backend/assets/js/demo/dashboard.demo.js')}}" type="664157f6441cb17f9c2ca824-text/javascript"></script>
    <script src="{{asset('backend/assets/js/demo/pos-customer-order.demo.js')}}" type="04d1935fd929e763fb864d98-text/javascript"></script>

    <script src="{{asset('backend/assets/plugins/summernote/dist/summernote-lite.min.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-tmpl/js/tmpl.min.js')}}" type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-load-image/js/load-image.all.min.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.min.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/jquery.iframe-transport.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/jquery.fileupload.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/jquery.fileupload-process.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/jquery.fileupload-image.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/jquery.fileupload-video.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js')}}"
		type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/tag-it/js/tag-it.min.js')}}" type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>
    <script src="{{asset('backend/assets/js/demo/page-product-details.demo.js')}}" type="2d3a5e6bb6c2f4c14dd3fa70-text/javascript"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3"
		type="664157f6441cb17f9c2ca824-text/javascript"></script>
    <script type="664157f6441cb17f9c2ca824-text/javascript">
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-Y3Q0VGQKY3');
	</script>
    <script src="{{ asset('backend/assets/js/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="664157f6441cb17f9c2ca824-|49" defer></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"810f31073b6f87f9","version":"2023.8.0","r":1,"b":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}'
        crossorigin="anonymous"></script>


    @livewireScripts
    @stack('js')
</body>

<!-- Mirrored from seantheme.com/studio/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2023 17:37:37 GMT -->

</html>
