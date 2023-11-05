@push('css')
    <style>
        .closeBtn {
            margin-right: 20px;
            padding: 10px 20px;
        }

        .menu-search .menu-search-icon {
            position: absolute;
            margin-top: 7px;
            margin-left: 7px;
        }

        .menu-search input {
            padding-left: 30px;
        }
    </style>
@endpush
<div>

    <div class="pos-content">

        <div class="menu menuSearch">
            <div class="row">
                <div class="col-4">

                </div>
                <div class="col-4">
                    <div class="menu menu-search">
                        <div class="menu-search-icon"><i class="fa fa-search"></i></div>
                        <x-input.text type="text" class="form-control" placeholder="Search menu..." />
                    </div>
                </div>
                <div class="col-4">
                    <a href="{{ route('backend.dashboard') }}" wire:navigate><button
                            class="btn btn-danger float-end closeBtn">Close</button></a>
                </div>
            </div>
        </div>

        <div class="pos-content-container h-100">
            <div class="row gx-4">
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="meat">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-1.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Grill Chicken Chop&reg;</div>
                            <div class="desc">chicken, egg, mushroom, salad</div>
                            <div class="price">$10.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="meat">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-2.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Grill Pork Chop&reg;</div>
                            <div class="desc">pork, egg, mushroom, salad</div>
                            <div class="price">$12.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="meat">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-3.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Capellini Tomato Sauce&reg;</div>
                            <div class="desc">spaghetti, tomato, mushroom </div>
                            <div class="price">$11.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="meat">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-4.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Vegan Salad Bowl&reg;</div>
                            <div class="desc">apple, carrot, tomato </div>
                            <div class="price">$6.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="pizza">
                    <div class="pos-product not-available">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-5.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Hawaiian Pizza&reg;</div>
                            <div class="desc">pizza, crab meat, pineapple </div>
                            <div class="price">$20.99</div>
                        </div>
                        <div class="not-available-text">
                            <div>Not Available</div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="burger">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-17.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Perfect Burger</div>
                            <div class="desc">Dill pickle, cheddar cheese, tomato, red onion, ground
                                chuck beef</div>
                            <div class="price">$8.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="burger">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-6.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Avocado Shake</div>
                            <div class="desc">avocado, milk, vanilla</div>
                            <div class="price">$3.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="burger">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-7.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Coffee Latte</div>
                            <div class="desc">espresso, milk</div>
                            <div class="price">$2.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="burger">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-8.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Vita C Detox Juice</div>
                            <div class="desc">apricot, apple, carrot and ginger juice</div>
                            <div class="price">$2.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="snacks">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-9.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Pancake</div>
                            <div class="desc">Non dairy, egg, baking soda, sugar, all purpose flour
                            </div>
                            <div class="price">$5.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="snacks">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-10.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Mushroom soup</div>
                            <div class="desc">Evaporated milk, marsala wine, beef cubes, chicken broth,
                                butter</div>
                            <div class="price">$3.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="snacks">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-11.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Baked chicken wing</div>
                            <div class="desc">Chicken wings, a1 steak sauce, honey, cayenne pepper</div>
                            <div class="price">$6.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="meat">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-12.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Veggie Spaghetti</div>
                            <div class="desc">Yellow squash, pasta, roasted red peppers, zucchini</div>
                            <div class="price">$12.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="desserts">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-13.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Vanilla Ice Cream</div>
                            <div class="desc">Heavy whipping cream, white sugar, vanilla extract</div>
                            <div class="price">$3.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="desserts">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-15.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Perfect Yeast Doughnuts</div>
                            <div class="desc">Chocolate hazelnut spread, bread flour, doughnuts, quick
                                rise yeast, butter</div>
                            <div class="price">$2.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="desserts">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-14.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Macarons</div>
                            <div class="desc">Almond flour, egg whites, heavy cream, food coloring,
                                powdered sugar</div>
                            <div class="price">$4.99</div>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4" data-type="desserts">
                    <a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
                        <div class="img"
                            style="background-image: url({{ asset('backend/assets/img/pos/product-16.jpg') }})">
                        </div>
                        <div class="info">
                            <div class="title">Perfect Vanilla Cupcake</div>
                            <div class="desc">Baking powder, all purpose flour, plain kefir, vanilla
                                extract</div>
                            <div class="price">$2.99</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="pos-sidebar" id="pos-sidebar">
        <div class="h-100 d-flex flex-column p-0">

            <div class="pos-sidebar-header">
                <div class="back-btn">
                    <button type="button" data-toggle-class="pos-mobile-sidebar-toggled" data-toggle-target="#pos"
                        class="btn">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                </div>
                <div class="icon"><i class="fa fa-plate-wheat"></i></div>
                <div class="title">Table 01</div>
                <div class="order small">Order: <span class="fw-semibold">#0056</span></div>
            </div>


            <div class="pos-sidebar-nav small">
                <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-bs-toggle="tab"
                            data-bs-target="#newOrderTab">New Order (5)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab"
                            data-bs-target="#orderHistoryTab">Order History (0)</a>
                    </li>
                </ul>
            </div>


            <div class="pos-sidebar-body tab-content" data-scrollbar="true" data-height="100%">

                <div class="tab-pane fade h-100 show active" id="newOrderTab">

                    <div class="pos-order">
                        <div class="pos-order-product">
                            <div class="img"
                                style="background-image: url({{ asset('backend/assets/img/pos/product-2.jpg') }})">
                            </div>
                            <div class="flex-1">
                                <div class="h6 mb-1">Grill Pork Chop</div>
                                <div class="small">$12.99</div>
                                <div class="small mb-2">- size: large</div>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-secondary btn-sm"><i
                                            class="fa fa-minus"></i></a>
                                    <input type="text"
                                        class="form-control w-50px form-control-sm mx-2 bg-white bg-opacity-25 bg-white bg-opacity-25 text-center"
                                        value="01">
                                    <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pos-order-price d-flex flex-column">
                            <div class="flex-1">$12.99</div>
                            <div class="text-end">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="pos-order">
                        <div class="pos-order-product">
                            <div class="img"
                                style="background-image: url({{ asset('backend/assets/img/pos/product-8.jpg') }})">
                            </div>
                            <div class="flex-1">
                                <div class="h6 mb-1">Orange Juice</div>
                                <div class="small">$5.00</div>
                                <div class="small mb-2">
                                    - size: large<br>
                                    - less ice
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-secondary btn-sm"><i
                                            class="fa fa-minus"></i></a>
                                    <input type="text"
                                        class="form-control w-50px form-control-sm mx-2 bg-white bg-opacity-25 bg-white bg-opacity-25 text-center"
                                        value="02">
                                    <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pos-order-price d-flex flex-column">
                            <div class="flex-1">$10.00</div>
                            <div class="text-end">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="pos-order">
                        <div class="pos-order-product">
                            <div class="img"
                                style="background-image: url({{ asset('backend/assets/img/pos/product-1.jpg') }})">
                            </div>
                            <div class="flex-1">
                                <div class="h6 mb-1">Grill chicken chop</div>
                                <div class="small">$10.99</div>
                                <div class="small mb-2">
                                    - size: large<br>
                                    - spicy: medium
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-secondary btn-sm"><i
                                            class="fa fa-minus"></i></a>
                                    <input type="text"
                                        class="form-control w-50px form-control-sm mx-2 bg-white bg-opacity-25 bg-white bg-opacity-25 text-center"
                                        value="01">
                                    <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pos-order-price d-flex flex-column">
                            <div class="flex-1">$10.99</div>
                            <div class="text-end">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="pos-order">
                        <div class="pos-order-product">
                            <div class="img"
                                style="background-image: url({{ asset('backend/assets/img/pos/product-5.jpg') }})">
                            </div>
                            <div class="flex-1">
                                <div class="h6 mb-1">Hawaiian Pizza</div>
                                <div class="small">$15.00</div>
                                <div class="small mb-2">
                                    - size: large<br>
                                    - more onion
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-secondary btn-sm"><i
                                            class="fa fa-minus"></i></a>
                                    <input type="text"
                                        class="form-control w-50px form-control-sm mx-2 bg-white bg-opacity-25 bg-white bg-opacity-25 text-center"
                                        value="01">
                                    <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pos-order-price d-flex flex-column">
                            <div class="flex-1">$15.00</div>
                            <div class="text-end">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="pos-order-confirmation text-center d-flex flex-column justify-content-center">
                            <div class="mb-1">
                                <i class="fa fa-trash fs-36px lh-1 text-body text-opacity-25"></i>
                            </div>
                            <div class="mb-2">Remove this item?</div>
                            <div>
                                <a href="#" class="btn btn-default btn-sm ms-auto me-2 width-100px">No</a>
                                <a href="#" class="btn btn-danger btn-sm width-100px">Yes</a>
                            </div>
                        </div>
                    </div>


                    <div class="pos-order">
                        <div class="pos-order-product">
                            <div class="img"
                                style="background-image: url({{ asset('backend/assets/img/pos/product-10.jpg') }})">
                            </div>
                            <div class="flex-1">
                                <div class="h6 mb-1">Mushroom Soup</div>
                                <div class="small">$3.99</div>
                                <div class="small mb-2">
                                    - size: large<br>
                                    - more cheese
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-secondary btn-sm"><i
                                            class="fa fa-minus"></i></a>
                                    <input type="text"
                                        class="form-control w-50px form-control-sm mx-2 bg-white bg-opacity-25 bg-white bg-opacity-25 text-center"
                                        value="01">
                                    <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pos-order-price d-flex flex-column">
                            <div class="flex-1">$3.99</div>
                            <div class="text-end">
                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="tab-pane fade h-100" id="orderHistoryTab">
                    <div class="h-100 d-flex align-items-center justify-content-center text-center p-20">
                        <div>
                            <div class="mb-3 mt-n5">
                                <svg width="6em" height="6em" viewBox="0 0 16 16" class="text-gray-300"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z" />
                                    <path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z" />
                                </svg>
                            </div>
                            <h5>No order history found</h5>
                        </div>
                    </div>
                </div>

            </div>


            <div class="pos-sidebar-footer">
                <div class="d-flex align-items-center mb-2">
                    <div>Subtotal</div>
                    <div class="flex-1 text-end h6 mb-0">$30.98</div>
                </div>
                <div class="d-flex align-items-center">
                    <div>Taxes (6%)</div>
                    <div class="flex-1 text-end h6 mb-0">$2.12</div>
                </div>
                <hr class="opacity-1 my-10px">
                <div class="d-flex align-items-center mb-2">
                    <div>Total</div>
                    <div class="flex-1 text-end h4 mb-0">$33.10</div>
                </div>
                <div class="mt-3">
                    <div class="d-flex">
                        <a href="#"
                            class="btn btn-default w-70px me-10px d-flex align-items-center justify-content-center">
                            <span>
                                <i class="fa fa-bell fa-lg my-10px d-block"></i>
                                <span class="small fw-semibold">Service</span>
                            </span>
                        </a>
                        <a href="#"
                            class="btn btn-default w-70px me-10px d-flex align-items-center justify-content-center">
                            <span>
                                <i class="fa fa-receipt fa-fw fa-lg my-10px d-block"></i>
                                <span class="small fw-semibold">Bill</span>
                            </span>
                        </a>
                        <a href="#"
                            class="btn btn-theme flex-fill d-flex align-items-center justify-content-center">
                            <span>
                                <i class="fa fa-cash-register fa-lg my-10px d-block"></i>
                                <span class="small fw-semibold">Submit Order</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
