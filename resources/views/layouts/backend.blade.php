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
        .breadcrumb-item+.breadcrumb-item::before {
            float: left;
            padding-right: var(--bs-breadcrumb-item-padding-x);
            color: var(--bs-breadcrumb-divider-color);
            content: none;
        }

        .app-sidebar .menu .reports .menu-submenu .menu-item .menu-link {
            padding-left: 0px;
        }

        .dropdownsave {
            float: right;
        }

        .form-check {
            margin-left: 5px;
        }

        .card-title {
            margin-left: 20px;
            margin-top: 20px;
        }

        .card-header h5 {
            font-size: 14px !important;
        }

        .card {
            border: var(--bs-card-border-width) solid #9396a1;
        }

        .form-control {
            border: var(--bs-border-width) solid #96989c;
        }

        .app-sidebar .menu .menu-item.active:not(.has-sub)>.menu-link {
            color: #5555c3;
        }

        .btn-success {
            background-color: green !important;
            color: #fff;
        }

        .btn-success:hover {
            background-color: rgb(2, 74, 2) !important;
            color: #fff;
        }

        .btn-danger {
            background-color: red !important;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: rgb(135, 5, 5) !important;
            color: #fff;
        }

        hr {
            margin: 5px 0;
        }

        .app-content {
            padding: 0.5rem 3.125rem;
            position: relative;
            min-height: 100%;
            margin-left: 15rem;
        }
    </style>
    @vite(['resources/sass/backend.scss', 'resources/js/backend.js'])
    @stack('css')
</head>

<body>
    <div id="app" class="app">
        <div id="header" class="app-header">
            <div class="mobile-toggler">
                <button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>
            <div class="brand">
                <div class="desktop-toggler">
                    <button type="button" class="menu-toggler" data-toggle="sidebar-minify">
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>
                <a class="brand-logo">
                    <img src="{{ asset('backend/assets/img/logo.png') }}" class="invert-dark" alt height="20">
                </a>
            </div>


            <div class="menu">
                <form class="menu-search" method="POST" name="header_search_form">
                    <div class="menu-search-icon"><i class="fa fa-search"></i></div>
                    <div class="menu-search-input">
                        <input type="text" class="form-control" placeholder="Search menu...">
                    </div>
                </form>
                <div class="menu-item dropdown">
                    <a data-bs-toggle="dropdown" data-display="static" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-bell nav-icon"></i></div>
                        <div class="menu-label">3</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-notification">
                        <h6 class="dropdown-header text-body-emphasis mb-1">Notifications</h6>

                        <div class="p-2 text-center mb-n1">
                            <a class="text-body-emphasis text-opacity-50 text-decoration-none">See
                                all</a>
                        </div>
                    </div>
                </div>
                <div class="menu-item dropdown" x-data="{ open: false }">
                    <a class="menu-link" x-bind:class="open ? 'show' : ''" x-on:click="open = ! open">
                        <div class="menu-img online">

                            <img src="{{ auth()->user()->profile_image }}" alt class="ms-100 mh-100 rounded-circle">

                        </div>
                        <div class="menu-text">{{ auth()->user()->email }}</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-lg-3" x-bind:class="open ? 'show' : ''">
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('backend.profile') }}">Edit
                            Profile <i class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">Log Out <i
                                class="fa fa-toggle-off fa-fw ms-auto text-body text-opacity-50"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="sidebar" class="app-sidebar">
            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
                <div class="menu">
                    <div class="menu-header">Navigation</div>
                    <div class="menu-item active">
                        <a href="{{ route('backend.dashboard') }}" wire:navigate class="menu-link">
                            <span class="menu-icon"><i class="fa fa-laptop"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-sliders"></i>
                            </span>
                            <span class="menu-text">Settings</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="{{ route('backend.setting.outlet_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Outlet</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.setting.warehouse_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Warehouse</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.setting.delivery_challan_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Delivery Challan</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.setting.multiple_payment_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Mutliple Payment</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.setting.payment_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Payment Method</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </span>
                            <span class="menu-text">Product Manage</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="{{ route('backend.product.product_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Products</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.product.vendor_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Brands</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.product.categorie_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Categories</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.product.unit_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Units</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-users"></i>
                            </span>
                            <span class="menu-text">Contact Manage</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="{{ route('backend.contact.customer_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Customers</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.contact.supplier_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Suppliers</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.contact.biller_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Billers</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.contact.stuff_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Stuffs</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.contact.group_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Groups</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-file-text"></i>
                            </span>
                            <span class="menu-text">Order Manage</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="{{ route('backend.order.purchase_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Purchases</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.order.purchase_return_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Purchase Returns</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.order.sale_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Sales</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.order.sales_return_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Sales Return</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.order.quotation_list') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Quotation</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-database"></i>
                            </span>
                            <span class="menu-text">Invetory</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="{{ route('backend.inventory.stock_adjustment_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Stock Adjustment</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.inventory.stock_movement_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Stock Movement</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-dollar"></i>
                            </span>
                            <span class="menu-text">Accounting</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="{{ route('backend.accounting.chart_account_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Chart Of Account</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.accounting.accounting_receipt_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Accounting Receipt</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.accounting.receipt_type_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Receipt Type</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('backend.accounting.ledger_account_list') }}" wire:navigate
                                    class="menu-link">
                                    <span class="menu-text">Ledger Account</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
        </div>

        <div id="content" class="app-content">
            <div>
                <h1 class="page-header">
                    @isset($title)
                        {{ $title }}
                    @endisset
                    @isset($button)
                        <span {{ $button->attributes->merge(['class' => 'float-end']) }}>{{ $button }}</span>
                    @endisset
                </h1>

            </div>
            {{ $slot }}
        </div>

        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
    </div>

    <script src="{{ asset('backend/assets/js/vendor.min.js') }}?v={{ now() }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/app.min.js') }}?v={{ now() }}" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
