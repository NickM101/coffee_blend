@extends('layouts.app')

@section('content')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Product Detail</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product Detail</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

   <div class="container">
       @if(Session::has('success'))
               <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('success')}}</p>
       @endif
   </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset('assets/images/'.$product->image) }}" class="image-popup"><img src="{{ asset('assets/images/'.$product->image) }}" class="img-fluid"  alt={{$product->name}}></a>
                </div>



                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3 class="text-white">{{ $product->name }}</h3>
                    <p class="price"><span>Kes.{{ $product->price }}</span></p>
                    <p>{{ $product->description }}</p>
{{--                    <div class="row mt-4">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group d-flex">--}}
{{--                                <div class="select-wrap">--}}
{{--                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>--}}
{{--                                    <select name="" id="" class="form-control">--}}
{{--                                        <option value="">Small</option>--}}
{{--                                        <option value="">Medium</option>--}}
{{--                                        <option value="">Large</option>--}}
{{--                                        <option value="">Extra Large</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="w-100"></div>--}}
{{--                        <div class="input-group col-md-6 d-flex mb-3">--}}
{{--	             	<span class="input-group-btn mr-2">--}}
{{--	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">--}}
{{--	                   <i class="icon-minus"></i>--}}
{{--	                	</button>--}}
{{--	            		</span>--}}
{{--                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">--}}
{{--                            <span class="input-group-btn ml-2">--}}
{{--	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">--}}
{{--	                     <i class="icon-plus"></i>--}}
{{--	                 </button>--}}
{{--	             	</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <form method="POST" action="{{ route('add.cart', $product->id) }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="image" value="{{ $product->image }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        @if($checkCart == 0)
                            <input type="submit" value="Add to Cart" class="btn btn-primary py-3 px-5"/>
                            @else
                            <button style="background-color: black" class="btn py-3 px-5" disabled>Item is already in cart</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Related products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">


                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-md-3">
                        <div class="menu-entry">
                            <a href="{{ route('product.single', $relatedProduct->id) }}" class="img" style="background-image: url({{ asset('assets/images/'.$relatedProduct->image) }});"></a>
                            <div class="text text-center pt-4">
                                <h3><a href="{{ route('product.single', $relatedProduct->id) }}">{{ $relatedProduct->name  }}</a></h3>
                                <p>{{ $relatedProduct->description }}</p>
                                <p class="price"><span>{{ $relatedProduct->price }}</span></p>
                                <form method="POST" action="{{ route('add.cart', $relatedProduct->id) }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $relatedProduct->id }}">
                                    <input type="hidden" name="price" value="{{ $relatedProduct->price }}">
                                    <input type="hidden" name="image" value="{{ $relatedProduct->image }}">
                                    <input type="hidden" name="name" value="{{ $relatedProduct->name }}">
                                    <p><a href="{{ route('product.single', $relatedProduct->id) }}" class="btn btn-primary btn-outline-primary">Open Product</a></p>

                                    {{--                                    @if($checkCart == 0)--}}
{{--                                        <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Add to Cart</button>--}}
{{--                                    @else--}}
{{--                                        <button style="background-color: black" class="btn py-3 px-5" disabled>Item is already in cart</button>--}}
{{--                                    @endif--}}
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
