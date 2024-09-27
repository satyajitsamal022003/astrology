@extends('user.layout')
@section('content')
<section class="container">
    <div class="as_breadcrum_wrapper"
        style="background-image: url('/user/assets/images/breadcrum-img-1.jpg');">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Category</h1>
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>{{$category->categoryName}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="as_blog_wrapper as_padderBottom40 as_padderTop40">
    <div class="container">

        <div class="sub-category-grid">
            @foreach($subcategories as $subcat)
            <div class="sub-item">
                <a href="#">
                    @php
                    $imagePath = public_path('subcategory/' . $subcat->image);
                    $imageUrl = file_exists($imagePath) && $subcat->image ? url('/subcategory/' . $subcat->image) : url('blank.png');
                    @endphp
                    <img src="{{ $imageUrl }}" alt="{{ $subcat->subCategoryName }}">
                </a>
                <div class="sub-text">
                    <h4>{{ $subcat->subCategoryName }}</h4>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination for Subcategories -->
        <div class="pagination-bottom" data-aos="fade-up">
            <nav>
                <ul class="pagination justify-content-center">
                    @if ($subcategories->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">&lsaquo; Previous</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $subcategories->previousPageUrl() }}" rel="prev">&lsaquo; Previous</a>
                    </li>
                    @endif

                    @php
                    $totalPages = $subcategories->lastPage();
                    $currentPage = $subcategories->currentPage();
                    $showDots = false;
                    @endphp

                    @for ($i = 1; $i <= $totalPages; $i++)
                        @if ($i < 4 || $i> $totalPages - 3 || ($i >= $currentPage - 1 && $i <= $currentPage + 1))
                            @if ($i==$currentPage)
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $subcategories->url($i) }}">{{ $i }}</a></li>
                            @endif
                            @elseif (!$showDots)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            @php $showDots = true; @endphp
                            @endif
                            @endfor

                            @if ($subcategories->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $subcategories->nextPageUrl() }}" rel="next">Next &rsaquo;</a>
                            </li>
                            @else
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">Next &rsaquo;</span>
                            </li>
                            @endif
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <div class="inline-header aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="main-text">
                        <h1 class="as_heading">{{ $category->categoryName }} (Main Category Products)</h1>
                    </div>
                    <div class="filter justify-content-end">
                        <form action="" method="get">
                            <div class="select-filter">
                                <select name="orderBy" class="form-control form-select">
                                    <option value="">Sort By</option>
                                    <option value="categoryName">A-Z</option>
                                    <option value="categoryName_Desc">Z-A</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-2" data-aos="fade-down" data-aos-duration="1500">
                    @foreach($maincategoryproducts as $maincat)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="as_product_box">
                            <a href="{{ route('user.productdetails', $maincat->id) }}" class="as_product_img">
                                @php
                                $mainprodimage = public_path('product/' . $maincat->image1);
                                $mainprodurl = file_exists($mainprodimage) && $maincat->image1 ? url('/product/' . $maincat->image1) : url('blank.png');
                                @endphp
                                <img src="{{ $mainprodurl }}" alt="{{ $maincat->productName }}" class="img-responsive">
                            </a>
                            <div class="as_product_detail">
                                <h4 class="as_subheading">{{ $maincat->productName }}</h4>
                                <span class="as_price">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                    <span style="text-decoration: line-through;">{{ $maincat->priceMRP }}</span>
                                    <span>{{ $maincat->priceB2C }} / {{ $maincat->price_type }}</span>
                                </span>
                                <div class="space-between">
                                    <a href="{{ route('user.productdetails', $maincat->id) }}" class="as_btn_cart"><span>View Details</span></a>
                                    <a href="javascript:;" class="enquire_btn" data-bs-toggle="modal" data-bs-target="#enquire_modal"><span>Order Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 text-center">
                <div class="inline-header aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="main-text">
                        <h1 class="as_heading">{{ $category->categoryName }} (Sub Category Products)</h1>
                    </div>
                </div>
                <div class="row mt-2" data-aos="fade-down" data-aos-duration="1500">
                    @foreach($subcategoryproducts as $subcat)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="as_product_box">
                            <a href="{{ route('user.productdetails', $subcat->id) }}" class="as_product_img">
                                @php
                                $mainprodimage = public_path('product/' . $subcat->image1);
                                $mainprodurl = file_exists($mainprodimage) && $subcat->image1 ? url('/product/' . $subcat->image1) : url('blank.png');
                                @endphp
                                <img src="{{ $mainprodurl }}" alt="{{ $subcat->productName }}" class="img-responsive">
                            </a>
                            <div class="as_product_detail">
                                <h4 class="as_subheading">{{ $subcat->productName }}</h4>
                                <span class="as_price">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                    <span style="text-decoration: line-through;">{{ $subcat->priceMRP }}</span>
                                    <span>{{ $subcat->priceB2C }} / Pcs</span>
                                </span>
                                <div class="space-between">
                                    <a href="{{ route('user.productdetails', $subcat->id) }}" class="as_btn_cart"><span>View Details</span></a>
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
@endsection