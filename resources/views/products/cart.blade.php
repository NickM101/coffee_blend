@extends('layouts.app')

@section('content')

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});" >
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Cart</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="container">
        @if(Session::has('delete'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('delete')}}</p>
        @endif
    </div>
    <section class="ftco-section ftco-cart">
    @if($cart->count() > 0)

        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">

                            <table class="table-dark overflow-x-hidden" style="width: 1100px">
                            <thead class="thead-primary" style="background-color: #c49b63; height: 100px">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
{{--                                <th>Quantity</th>--}}
                                <th>Total</th>
                            </tr>
                            </thead>

                                @foreach($cart as $cartProduct)
                                    <tr class="text-center" style="height: 140px">
                                        <td class="product-remove"><a href="{{ route('cart.product.delete', $cartProduct->product_id) }}"><span class="icon-close"></span></a></td>

                                        <td class="image-prod"><img width="100" height="140" src="{{ asset('assets/images/'.$cartProduct->image) }}"/></td>

                                        <td class="product-name">
                                            <h3>{{ $cartProduct->name }}</h3>
                                        </td>

                                        <td class="price">{{ $cartProduct->price }}</td>

                                        {{--                                    <td>--}}
                                        {{--                                        <div class="input-group mb-3">--}}
                                        {{--                                            <input disabled type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </td>--}}

                                        <td class="total">{{ $cartProduct->price }}</td>
                                    </tr>
                                @endforeach

                        </table>

                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>Kes. {{ $totalCost }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>Kes. 0</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>Kes. 40</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>Kes {{ $totalCost == 0 ? 0 : $totalCost + 40 }}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="#" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>

    @else
        <div style="justify-items: center">
            <p class="alert alert-danger w-75 text-center">No products in cart</p>
        </div>
    @endif
    </section>
@endsection
