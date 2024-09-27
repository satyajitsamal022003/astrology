@extends('user.layout')
@section('content')
<section class="container">
    <div class="as_breadcrum_wrapper"
        style="background-image: url('/user/assets/images/breadcrum-img-1.jpg');">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>{{$productdetails->productName}}</h1>
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="category.html">{{$productdetails->category->categoryName}}</a></li>
                    <li>{{$productdetails->productName}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="as_service_wrapper product-details-section as_breadcrum_top as_padderBottom40">
    <div class="container">
        <div class="row as_verticle_center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="as_product_box mt-0" data-aos="fade-right">
                            <div class="as_product_img">
                                <div class="fotorama" data-nav="thumbs">
                                    @php
                                    $images = [
                                    $productdetails->image1,
                                    $productdetails->image2,
                                    $productdetails->image3,
                                    ];
                                    @endphp

                                    @foreach ($images as $image)
                                    @php
                                    $imagePath = public_path('product/' . $image);
                                    $imageUrl = file_exists($imagePath) && $image ? url('/product/' . $image) : url('/blank.png');
                                    @endphp
                                    <a href="{{ $imageUrl }}">
                                        <img src="{{ $imageUrl }}" alt="image">
                                    </a>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="as_product_box product-details-page">
                            <div class="as_product_detail details-height">
                                <h4 class="as_subheading" data-aos="fade-up">{{$productdetails->productName}}</h4>

                                <div class="main-price">
                                    <span class="as_price" data-aos="fade-up">
                                        <i class="fa-solid fa-indian-rupee-sign"></i>
                                        <span id="product-price">{{$productdetails->priceB2C}}/{{$productdetails->price_type}}</span>
                                    </span>
                                    <span class="mrp-price" data-aos="fade-up">
                                        <i class="fa-solid fa-indian-rupee-sign"></i>
                                        {{$productdetails->priceMRP}}/{{$productdetails->price_type}}
                                    </span>
                                </div>

                                @php($couriertype = App\Models\CourierType::where('id', $productdetails->courierTypeId)->first())
                                <div class="delivery-cost">
                                    Delivery Charges Apply
                                    @if($couriertype)
                                    @if($couriertype->courier_price == 0)
                                    Free
                                    @else
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                    <span id="delivery-cost">{{$couriertype->courier_price}}</span>
                                    @endif
                                    @else
                                    Not available
                                    @endif
                                </div>

                                <!-- Product price end -->

                                <div class="quantity-option mt-2">
                                    <span class="minus" id="minus" style="cursor: pointer;"><i class="fa-regular fa-minus"></i></span>
                                    <input type="number" id="quantity" value="1" min="1" readonly>
                                    <span class="plus" id="plus" style="cursor: pointer;"><i class="fa-regular fa-plus"></i></span>
                                </div>

                                <div class="extra-checkbox mt-3">
                                    <div class="data-check">
                                        @php($activation = App\Models\Activation::where('id', $productdetails->activationId)->first())
                                        <label>
                                            @if($activation && $activation->id == 1)
                                            (Free)
                                            @elseif($activation && $activation->id == 2)
                                            Activation N/A
                                            @elseif($activation)
                                            ({{ $activation->amount ?? 'N/A' }})
                                            Activation
                                            <input type="checkbox" name="as_remember_me" value="1">
                                            <span class="checkmark"></span>
                                            @else
                                            @endif
                                        </label>
                                    </div>
                                    <div class="data-check">
                                        @php($Certification = App\Models\Certification::where('id',$productdetails->certificationId)->first())
                                        <label>
                                            @if($Certification && $Certification->id == 1)
                                            (Free)
                                            @elseif($Certification && $Certification->id == 2)
                                            Certification N/A
                                            @elseif($Certification)
                                            ({{ $Certification->amount ?? 'N/A' }})
                                            Certification
                                            <input type="checkbox" name="as_remember_me" value="1">
                                            <span class="checkmark"></span>
                                            @else
                                            @endif
                                        </label>
                                    </div>
                                </div>

                                <!--button start-->
                                <div class="main-btn mt-2 space-between justify-content-start" data-aos="zoom-in">
                                    <a href="javascript:;" class="as_btn"><span>Buy Now</span></a>
                                    <a href="javascript:;" class="as_btn-2"><span>Add to Cart</span></a>
                                    <a href="javascript:;" class="wishlist-btn-details" title="Add to Wishlist"><i
                                            class="fa-light fa-heart"></i></a>
                                </div>
                                <!--button end-->

                                <ul class="short-note">
                                    {{$productdetails->productDesc1}}
                                </ul>

                                <!--product variant start-->
                                <div class="product-variant-section">
                                    <h3>Product Variant :</h3>
                                    <div class="variant-item">
                                        <h4>Oval Shape</h4>
                                    </div>
                                    <div class="variant-item">
                                        <h4>Standard Quality</h4>
                                    </div>
                                    <div class="variant-item">
                                        <h4>High 1 Quality</h4>
                                    </div>
                                    <div class="variant-item">
                                        <h4>Best Quality</h4>
                                    </div>
                                    <div class="variant-item">
                                        <h4>Medium Quality</h4>
                                    </div>
                                    <div class="variant-item">
                                        <h4>Moon Stone</h4>
                                    </div>
                                    <div class="variant-item">
                                        <h4>Sapphire</h4>
                                    </div>
                                    <div class="variant-item">
                                        <h4>1000 Beads</h4>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <!--product variant end-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start product details tab section -->
<section class="as_padderTop40 as_padderBottom40">
    <div class="container">
        <div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>{{$productdetails->productHeading2??'Description'}}</li>
                <li>{{$productdetails->productHeading3??'Shipping Policy'}}</li>
                <li>{{$productdetails->productHeading4??'Return Policy'}}</li>
                <li>{{$productdetails->productHeading5??'Payment Method'}}</li>
            </ul>
            <div class="resp-tabs-container">
                <div>
                    <p>{{$productdetails->productDesc2??'No Description Available'}}</p>
                </div>
                <!--tab 1 end-->
                <div>
                    @if($productdetails->productDesc3)
                    {{$productdetails->productDesc3}}
                    @else
                    <p>Worldwide Shipping is available.<br>
                        1. Free shipping on orders over INR 5,000 in India.<br>
                        2. COD is available for orders over INR 5,000 in India.<br>
                        3. International Express Shipping takes 4-7 days for delivery.</p>
                    @endif
                </div>
                <!--tab 2 end-->
                <div>
                    @if($productdetails->productDesc4)
                    {{$productdetails->productDesc4}}
                    @else
                    <p> 1. Get 100% moneyback on returning loose gemstones within 10 days for a full refund of the
                        gemstone price.<br>
                        2. Return Shipment is at customer's cost.<br>
                        3. Shipping Charges, GST/VAT and duties are not refundable.</p>
                    @endif

                </div>
                <!--tab 3 end-->
                <div>
                    @if($productdetails->productDesc4)
                    {{$productdetails->productDesc4}}
                    @else
                    <p> 1. Credit Cards: All Visa, MasterCard and American Express Credit Cards are accepted<br>
                        2. Debit Cards (India): All Visa and Maestro Debit Cards are accepted.<br>
                        3. PayPal, Net Banking, Cash Cards</p>
                    @endif
                </div>
                <!--tab 4 end-->
            </div>
        </div>
    </div>
</section>
<!-- End product details tab section -->

<!--Related Products start-->

<!-- Related Products start -->
@if($relatedProducts->count() > 0)
<section class="as_product_wrapper as_padderBottom40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <div class="inline-header">
                    <h1 class="as_heading">Related Products</h1>
                    <div class="text-center" data-aos="zoom-in">
                        <a href="product.html" class="as_btn">view more</a>
                    </div>
                </div>
                <div class="row mt-2" data-aos="fade-down" data-aos-duration="1500">
                    @foreach($relatedProducts as $related)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="as_product_box">
                            <a href="{{ route('user.productdetails', $related->id) }}" class="as_product_img">
                                @php($mainprodimage = public_path('product/' . $related->image1))
                                @php($mainprodurl = file_exists($mainprodimage) && $related->image1 ? url('/product/' . $related->image1) : url('blank.png'))
                                <img src="{{ $mainprodurl }}" alt="{{ $related->productName }}" class="img-responsive">
                            </a>
                            <div class="as_product_detail">
                                <h4 class="as_subheading">{{ $related->productName }}</h4>
                                <span class="as_price">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                    <span style="text-decoration: line-through;">{{ $related->priceMRP }}</span>
                                    <span>{{ $related->priceB2C }} / {{ $related->price_type }}</span>
                                </span>

                                <div class="space-between">
                                    <a href="{{ route('user.productdetails', $related->id) }}" class="as_btn_cart"><span>View Details</span></a>
                                    <a href="javascript:;" class="enquire_btn" data-bs-toggle="modal" data-bs-target="#enquire_modal"><span>Order Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- Related Products end -->

<!-- Popular Products start -->
@if($popularproducts->count() > 0)
<section class="as_product_wrapper as_padderBottom40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <div class="inline-header">
                    <h1 class="as_heading">Popular Products</h1>
                    <div class="text-center" data-aos="zoom-in">
                        <a href="popular-product.html" class="as_btn">view more</a>
                    </div>
                </div>
                <div class="row mt-2" data-aos="fade-down" data-aos-duration="1500">
                    @foreach($popularproducts as $popular)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="as_product_box">
                            <a href="{{ route('user.productdetails', $popular->id) }}" class="as_product_img">
                                @php($mainprodimage = public_path('product/' . $popular->image1))
                                @php($mainprodurl = file_exists($mainprodimage) && $popular->image1 ? url('/product/' . $popular->image1) : url('blank.png'))
                                <img src="{{ $mainprodurl }}" alt="{{ $popular->productName }}" class="img-responsive">
                            </a>
                            <div class="as_product_detail">
                                <h4 class="as_subheading">{{ $popular->productName }}</h4>
                                <span class="as_price">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                    <span style="text-decoration: line-through;">{{ $popular->priceMRP }}</span>
                                    <span>{{ $popular->priceB2C }} / {{ $popular->price_type }}</span>
                                </span>

                                <div class="space-between">
                                    <a href="{{ route('user.productdetails', $popular->id) }}" class="as_btn_cart"><span>View Details</span></a>
                                    <a href="javascript:;" class="enquire_btn" data-bs-toggle="modal" data-bs-target="#enquire_modal"><span>Order Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- Popular Products end -->



<!--Popular Products end-->
@endsection