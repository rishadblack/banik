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

        .form-control,
        .ts-control {
            border-radius: 5px !important;
            border: var(--bs-border-width) solid #96989c !important;
        }

        .app-sidebar .menu .menu-item.active:not(.has-sub)>.menu-link {
            color: #fff;
        }

        .app-sidebar .menu .menu-item .menu-link {
            line-height: var(--bs-app-sidebar-menu-link-line-height);
            color: #a3aed1;
        }

        .app-sidebar .menu .menu-item .menu-link:hover {
            color: #ffffff;
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

        .custom-dt-thead {
            vertical-align: bottom;
            background-color: #acacde;
            color: #40409d;
        }

        .filter-color {
            background-color: orange;
        }

        .table> :not(caption)>*>th {
            padding: .5rem .5rem;
            color: #3939a8;
        }

        .app-sidebar .menu .menu-item {
            padding: 4px 18px;
            font-size: 17px !important;
        }

        .app-sidebar-content {
            background-color: #111c43;
        }

        a {
            text-decoration: none;
        }

        /* .app-sidebar .menu .menu-item .menu-icon, */
        /* .app-sidebar .menu .menu-item .menu-text {
            margin-left: .625rem;
            color: #a3aed1;
        } */
        /* .app-sidebar .menu .menu-item .menu-text:hover {
            color: #ffffff;
        } */

        /* a {
            text-decoration: none;
        }

        a:hover {
            color: white;
            opacity: 0.9;
        }

*/
        .dropdown-toggle {
            white-space: nowrap;
            background-color: orange;
        }

        .dropdown-toggle:hover {
            background-color: rgb(235, 165, 33);
        }

        .app-sidebar {
            --bs-app-sidebar-width: 17rem;
        }

        .app-content {
            padding: 0.5rem 3.125rem 0.5rem 5.125rem;
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
                    {{-- <img src="{{ asset('backend/assets/img/logo.png') }}" class="invert-dark" alt height="20"> --}}
                    Banik BMS
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
                            <img src="" alt class="ms-100 mh-100 rounded-circle">
                        </div>
                        <div class="menu-text">{{ auth()->user()->email }}</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-lg-3" x-bind:class="open ? 'show' : ''">
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ route('backend.profile') }}">Profile <i
                                class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ route('backend.change_password') }}">Password <i
                                class="fa fa-key fa-fw ms-auto text-body text-opacity-50"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">Log Out <i
                                class="fa fa-toggle-off fa-fw ms-auto text-body text-opacity-50"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="sidebar" class="app-sidebar">
            <div class="app-sidebar-content shadow" data-scrollbar="true" data-height="100%">
                <div class="menu">
                    <div class="menu-header">Navigation</div>
                    <div class="menu-item">
                        <a href="{{ route('backend.dashboard') }}" wire:navigate class="menu-link">
                            <span class="menu-icon"><i class="fa fa-laptop"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </div>
                    <x-menu label="Setting" sub="setting" icon="fa fa-sliders" class="accountsetting">
                        <x-menu label="Outlet" route="backend.setting.outlet_list" />
                        <x-menu label="Warehouse" route="backend.setting.warehouse_list" />
                        <x-menu label="Payment Method" route="backend.setting.payment_list" />
                        <x-menu label="Account Setting" sub="accountsetting">
                            <x-menu label="Chart Of Account"
                                route="backend.setting.accountsetting.chart_account_list" />
                            <x-menu label="Ledger Account"
                                route="backend.setting.accountsetting.ledger_account_list" />
                        </x-menu>
                    </x-menu>
                    <x-menu label="Product Manage" sub="product" icon="fa fa-shopping-cart">
                        <x-menu label="Products" route="backend.product.product_list" />
                        <x-menu label="Brands" route="backend.product.vendor_list" />
                        <x-menu label="Categories" route="backend.product.categorie_list" />
                        <x-menu label="Units" route="backend.product.unit_list" />
                    </x-menu>
                    <x-menu label="Contact Manage" sub="contact" icon="fa fa-users">
                        <x-menu label="Customers" route="backend.contact.customer_list" />
                        <x-menu label="Suppliers" route="backend.contact.supplier_list" />
                        <x-menu label="Billers" route="backend.contact.biller_list" />
                        <x-menu label="Stuffs" route="backend.contact.stuff_list" />
                        <x-menu label="Groups" route="backend.contact.group_list" />
                    </x-menu>
                    <x-menu label="Order Manage" sub="order" icon="fa fa-file-text">
                        <x-menu label="Purchases" route="backend.order.purchase_list" />
                        <x-menu label="Purchase Returns" route="backend.order.purchase_return_list" />
                        <x-menu label="Sales" route="backend.order.sale_list" />
                        <x-menu label="Sales Return" route="backend.order.sales_return_list" />
                        <x-menu label="Quotation" route="backend.order.quotation_list" />
                        <x-menu label="Delivery Challan" route="backend.order.delivery_challan_list" />
                    </x-menu>
                    <x-menu label="Invetory" sub="inventory" icon="fa fa-database">
                        <x-menu label="Stock Adjustment" route="backend.inventory.stock_adjustment_list" />
                        <x-menu label="Stock Transfer" route="backend.inventory.stock_movement_list" />
                    </x-menu>
                    <x-menu label="Accounting" sub="accounting" icon="fa fa-dollar">
                        <x-menu label="Accounting Receipt" route="backend.accounting.accounting_receipt_list" />
                    </x-menu>
                    <x-menu label="Reports" sub="reports" icon="fa-file-text" class="accountsetting">
                        <x-menu label="Order Reports" sub="order_reports">
                            <x-menu label="Sales Report"
                                route="backend.reports.order_reports.sales_report" />
                            <x-menu label="Purchase Report"
                                route="backend.reports.order_reports.purchase_report" />
                                <x-menu label="Sales Due Report"
                                route="backend.reports.order_reports.sales_due_report" />
                        </x-menu>
                        <x-menu label="inventory Reports" sub="inventory_reports">
                            <x-menu label="Stock"
                                route="backend.reports.inventory_reports.stock_report" />
                            <x-menu label="Stock Movement"
                                route="backend.reports.inventory_reports.stock_movement_report" />
                                <x-menu label="Stock Adjustment"
                                route="backend.reports.inventory_reports.stock_adjustment_report" />
                                <x-menu label="Stock Transfer"
                                route="backend.reports.inventory_reports.stock_transfer_report" />
                                <x-menu label="Profit Loss"
                                route="backend.reports.inventory_reports.profit_loss" />
                        </x-menu>
                        <x-menu label="accounting Reports" sub="accounting_reports">
                            <x-menu label="General Ledger"
                                route="backend.reports.accounting_reports.general_ledger" />
                            <x-menu label="Customer Ledger"
                                route="backend.reports.accounting_reports.customer_ledger" />
                                <x-menu label="Supplier Ledger"
                                route="backend.reports.accounting_reports.supplier_ledger" />
                                <x-menu label="Customer Ledger"
                                route="backend.reports.accounting_reports.customer_ledger" />
                                <x-menu label="Payable Report"
                                route="backend.reports.accounting_reports.payable_report" />
                                <x-menu label="Receivable Report"
                                route="backend.reports.accounting_reports.receivable_report" />
                        </x-menu>
                    </x-menu>
                </div>
            </div>

            <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
        </div>

        <div id="content" class="app-content">

            <div class="mt-2 mb-1">
                <h1 class="page-header">
                    @isset($title)
                        {{ $title }}
                    @else
                        <div id="headertitle"></div>
                    @endisset
                    @isset($button)
                        <span {{ $button->attributes->merge(['class' => 'float-end']) }}>{{ $button }}</span>
                    @endisset
                </h1>
            </div>
            {{ $slot }}
        </div>

        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <div class="d-none">
            <iframe src="" id="printInvoice" name="printf" frameborder="0"></iframe>
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

        window.addEventListener('print', event => {
            if(typeof event.detail.url !== 'undefined' ){
                $('iframe#printInvoice').attr('src', event.detail.url);
            }else if(typeof event.detail.data !== 'undefined'){
                $('iframe#printInvoice').attr('src', event.detail.data.url);
            }else{
                $('iframe#printInvoice').attr('src', event.detail[0].url);
            }
        });
    </script>
    @stack('js')
</body>

</html>
