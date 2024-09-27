@extends('admin.layout')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Product</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://effectivegems.com/admin_panel/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="#">Product</a></li>
                        <li class="breadcrumb-item active"> Add Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#product_tab" data-toggle="tab">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#product_image_tab" data-toggle="tab">Product Image</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#product_description_tab" data-toggle="tab">Product Description</a>
                            </li>
                        </ul>

                        <form method="POST" action="{{ route('admin.storeproduct') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane show active" id="product_tab">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <fieldset class="fieldset-style">
                                                <div class="row">
                                                    <div class="col-xl-8">
                                                        <div class="form-group">
                                                            <label>Product Name </label>
                                                            <input class="form-control" id="" placeholder="Product Name" name="productName" required value="{{old('productName')}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Product Small Name (To show on the variant)</label>
                                                            <input class="form-control" id="" placeholder="Product Small Name" name="variantName">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Category </label>
                                                            <select class="form-control" id="" name="categoryId" onchange="getSubCategory(this.value)" required>
                                                                <option value="">--Select Category--</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Sub Category (Optional) </label>
                                                            <select class="form-control" id="subCategory" name="subCategoryId">
                                                                <option value="">--Select Sub Category--</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sort Order</label>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <input class="form-control" id="" placeholder="Sort Order All Product" name="sortOrder">
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input class="form-control" id="" placeholder="Sort Order Category" name="sortOrderSubCategory">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-lg-6">
                                                                    <input class="form-control" id="" placeholder="Sort Order Sub Category" name="sortOrderCategory">
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input class="form-control" id="" placeholder="Sort Order Popular" name="sortOrderPopular">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label for="price_type">Price Per <span class="text-danger">*</span> </label>
                                                                <select class="form-control" id="price_type" name="price_type">
                                                                    <option value="">--Select Price Per--</option>
                                                                    <option value="Gram"> Gram</option>
                                                                    <option value="Kg"> Kg</option>
                                                                    <option value="Ratti"> Ratti</option>
                                                                    <option value="Carat"> Carat</option>
                                                                    <option value="Pcs"> Pcs</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <div class="form-group">
                                                                    <label>Price MRP</label>
                                                                    <input class="form-control" placeholder="Price MRP" name="priceMRP">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="form-group">
                                                                    <label>Price B2C</label>
                                                                    <input class="form-control" placeholder="Price B2C" name="priceB2C">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="form-group">
                                                                    <label>Price B2B</label>
                                                                    <input class="form-control" placeholder="Price B2B" name="priceB2B">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label>Lower product range</label>
                                                                <input type="number" class="form-control" id="" name="min_product_qty">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Higher product range</label>
                                                                <input type="number" class="form-control" id="" name="max_product_qty">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-xl-12">
                                                                <label for="out_of_stock" class="flex items-center">
                                                                    <input id="out_of_stock" type="checkbox" class="form-checkbox" name="out_of_stock" value="1">
                                                                    <span class="ml-2 text-sm text-gray-600">Product Out Of Stock</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Certification</label>
                                                            <select class="form-control" id="" name="certificationId">
                                                                <option>--Select--</option>
                                                                <option value="1"> 250 (Amount)</option>
                                                                <option value="2"> Free</option>
                                                                <option value="3"> N/A</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Activation</label>
                                                            <select class="form-control" name="activationId">
                                                                <option>--Select--</option>
                                                                @foreach(App\Models\Activations::where('status',1)->get() as $activation)
                                                                <option value="{{ $activation->id }}">{{ $activation->amount }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Courier Type</label>
                                                            <select class="form-control" id="" name="courierTypeId">
                                                                <option>--Select--</option>
                                                                @foreach(App\Models\Couriertype::where('status', 1)->get() as $courier)
                                                                <option value="{{ $courier->id }}">
                                                                    {{ $courier->courier_name }}
                                                                    {{ $courier->courier_price != 0 ? ' - ' . $courier->courier_price : '' }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="row">
                                                                    <div class="col-xl-4">
                                                                        <label for="add_variant" class="flex items-center">
                                                                            <input id="add_variant" type="checkbox" class="form-checkbox" name="is_variant" checked>
                                                                            <span class="ml-2 text-sm text-gray-600">have Variant?</span>
                                                                        </label>
                                                                    </div>
                                                                    {{-- <div class="col-xl-4">
                                                                            <button type="button" class="bg-info btn text-white" id="add-variant-btn"><i class="fa-regular fa-plus"></i> Add Variant</button>
                                                                        </div> --}}
                                                                </div>
                                                                <div id="variant-container" class="variant-container">
                                                                    <div class="form-group">
                                                                        <label for="">Search Product For Variant</label>
                                                                        <select class="form-control" id="productvariant" name="variant[]" multiple>
                                                                            @foreach($products as $product)
                                                                            <option value="{{ $product->id }}">{{ $product->productName }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="main-box seo-box">
                                                            <div class="inline-text">
                                                                <p>Search Engine Listing Preview</p>
                                                                <a href="javascript:" onclick="showseoedit()">Edit Website SEO</a>
                                                            </div>
                                                            <div class="box-content">
                                                                <p id="seo_title"></p>
                                                                <a id="seo_url" href=""></a>
                                                                <span id="seo_description"></span>
                                                            </div>
                                                            <div class="seo-edit-box">
                                                                <div class="form-group">
                                                                    <label>Meta Title </label>
                                                                    <input class="form-control" id="metaTitle" placeholder="Meta Title" name="metaTitle">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Meta Description </label>
                                                                    <textarea id="metaDescription" class="form-control" placeholder="First Description" name="metaDescription" cols="50" rows="4"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Seo Url </label>
                                                                    <input class="form-control" id="seoUrl" placeholder="Seo Url" name="seoUrl" value="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Meta Keyword </label>
                                                                    <input class="form-control" id="metaKeyword" placeholder="Meta Keyword" name="metaKeyword" value="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Meta image </label>
                                                                    <input class="form-control" id="metaImage" placeholder="Meta image" name="metaImage" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function showseoedit() {
                                                                $(".seo-edit-box").toggle('slow');
                                                            }
                                                        </script>
                                                        <button type="button" class="btn btn-success mt-3">Generate
                                                            SEO
                                                        </button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div> <!-- end col -->
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">
                                            <a href="#product_image_tab" data-toggle="tab"><button class="btn btn-primary">Next</button></a>
                                        </label>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product_image_tab">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Icon </label>
                                                <div class="col-md-8">
                                                    <input class="form-control imgInp" name="icon" id="icon" type="file">
                                                    <span style="color:red; font-style:italic;font-size:15px">Only JPG,png files are acceptable</span><br>
                                                </div>
                                                <div class="col-md-2">
                                                    <img id="icondata" class="preview" src="assets/img/preview.jpg">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Image1</label>
                                                <div class="col-md-8">
                                                    <input class="form-control imgInp" name="image1" id="image1" type="file">
                                                    <span style="color:red; font-style:italic;font-size:15px">Only JPG,png files are acceptable</span><br>
                                                </div>
                                                <div class="col-md-2">
                                                    <img id="image1data" class="preview" src="assets/img/preview.jpg">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Image2</label>
                                                <div class="col-md-8">
                                                    <input class="form-control imgInp" name="image2" id="image2" type="file">
                                                    <span style="color:red; font-style:italic;font-size:15px">Only JPG,png files are acceptable</span><br>
                                                </div>
                                                <div class="col-md-2">
                                                    <img id="image2data" class="preview" src="assets/img/preview.jpg">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Image3 </label>
                                                <div class="col-md-8">
                                                    <input class="form-control imgInp" name="image3" id="image3" type="file">
                                                    <span style="color:red; font-style:italic;font-size:15px">Only JPG,png files are acceptable</span><br>
                                                </div>
                                                <div class="col-md-2">
                                                    <img id="image3data" class="preview" src="assets/img/preview.jpg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <!--image seo start-->
                                                <div class="main-box seo-box mt-3">
                                                    <div class="inline-text">
                                                        <p>Search Engine Image Preview</p>
                                                        <a href="javascript:" onclick="showseoimgedit()">Edit Image SEO</a>
                                                    </div>
                                                    <div class="seo-img-edit-box">
                                                        <div class="form-group">
                                                            <label>Alternative Text</label>
                                                            <input class="form-control" id="" placeholder="Alternative Text" name="" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image Title</label>
                                                            <input class="form-control" id="" placeholder="Image Title" name="" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image Caption</label>
                                                            <input class="form-control" id="" placeholder="Image Caption" name="" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Image Description </label>
                                                            <textarea id="" class="form-control" placeholder="Description" name="" cols="50" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function showseoimgedit() {
                                                        $(".seo-img-edit-box").toggle('slow');
                                                    }
                                                </script>
                                                <button type="button" class="btn btn-success mt-3">Save</button>
                                            </div>
                                            <div class="mb-2">
                                                <div class="main-box seo-box mt-3">
                                                    <div class="inline-text">
                                                        <p>Search Engine Image Preview</p>
                                                        <a href="javascript:" onclick="showseoimgedit()">Edit Image SEO</a>
                                                    </div>
                                                    <div class="seo-img-edit-box">
                                                        <div class="form-group">
                                                            <label>Alternative Text</label>
                                                            <input class="form-control" id="" placeholder="Alternative Text" name="" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Image Title</label>
                                                            <input class="form-control" id="" placeholder="Image Title" name="" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Image Caption</label>
                                                            <input class="form-control" id="" placeholder="Image Caption" name="" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-form-label">Image Description </label>
                                                            <textarea id="" class="form-control" placeholder="Description" name="" cols="50" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function showseoimgedit() {
                                                        $(".seo-img-edit-box").toggle('slow');
                                                    }
                                                </script>
                                                <button type="button" class="btn btn-success mt-3">Save</button>
                                                <!--image seo en-->
                                            </div>
                                            <div class="mb-2">
                                                <!--image seo start-->
                                                <div class="main-box seo-box mt-3">
                                                    <div class="inline-text">
                                                        <p>Search Engine Image Preview</p>
                                                        <a href="javascript:" onclick="showseoimgedit()">Edit Image SEO</a>
                                                    </div>
                                                    <div class="seo-img-edit-box">
                                                        <div class="form-group">
                                                            <label>Alternative Text</label>
                                                            <input class="form-control" id="" placeholder="Alternative Text" name="" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image Title</label>
                                                            <input class="form-control" id="" placeholder="Image Title" name="" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image Caption</label>
                                                            <input class="form-control" id="" placeholder="Image Caption" name="" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Image Description </label>
                                                            <textarea id="" class="form-control" placeholder="Description" name="" cols="50" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function showseoimgedit() {
                                                        $(".seo-img-edit-box").toggle('slow');
                                                    }
                                                </script>
                                                <button type="button" class="btn btn-success mt-3">Save</button>
                                                <!--image seo en-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">
                                            <a href="#product_tab" data-toggle="tab"><button class="btn btn-info">Previous</button></a>
                                            <a href="#product_description_tab" data-toggle="tab"><button class="btn btn-primary">Next</button></a>
                                        </label>
                                    </div>
                                </div>
                                <!--Description tab start-->
                                <div class="tab-pane" id="product_description_tab">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Heading 1</label>
                                                    <input class="form-control" placeholder="Heading 1" name="productHeading1" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description 1</label>
                                                    <textarea id="description1" name="productDesc1" class="form-control" placeholder="Description 1"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Heading 2</label>
                                                    <input class="form-control" placeholder="Heading 2" name="productHeading2" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description 2</label>
                                                    <textarea id="description2" name="productDesc2" class="form-control" placeholder="Description 2"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Heading 3</label>
                                                    <input class="form-control" placeholder="Heading 3" name="productHeading3" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description 3</label>
                                                    <textarea id="description3" name="productDesc3" class="form-control" placeholder="Description 3"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Heading 4</label>
                                                    <input class="form-control" placeholder="Heading 4" name="productHeading4" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description 4</label>
                                                    <textarea id="description4" name="productDesc4" class="form-control" placeholder="Description 4"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Heading 5</label>
                                                    <input class="form-control" placeholder="Heading 5" name="productHeading5" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description 5</label>
                                                    <textarea id="description5" name="productDesc5" class="form-control" placeholder="Description 5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">
                                            <a href="#product_image_tab" data-toggle="tab"><button class="btn btn-info">Previous</button></a>
                                            <button type="submit" class="btn btn-primary"> Add Product </button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    CKEDITOR.replace('description1');
    CKEDITOR.replace('description2');
    CKEDITOR.replace('description3');
    CKEDITOR.replace('description4');
    CKEDITOR.replace('description5');

    $(document).ready(function() {
        $('#productvariant').select2({
            placeholder: '--Select--',
            allowClear: true
        });
    });

    $(document).ready(function() {
        // $('#add-variant-btn').on('click', function() {
        //     const newVariant = `
        //         <div class="form-group">
        //             <label for="">Search Product For Variant</label>
        //             <div class="form-group d-flex align-items-center">
        //                 <input class="form-control" placeholder="Search Product and Select" name="product_variant[]">
        //                 <button type="button" class="btn text-white btn-sm bg-danger remove-variant-btn" style="margin-left: 5px;"> <i class="fa-regular fa-trash-can"></i></button>
        //             </div>
        //         </div>
        //     `;
        //     $('#variant-container').append(newVariant);
        // });

        // // Delegate the click event to remove buttons
        // $('#variant-container').on('click', '.remove-variant-btn', function() {
        //     $(this).closest('.variant-item').remove();
        // });

        $('#add_variant').on('change', function() {
            if ($(this).is(':checked')) {
                $('.variant-container').slideDown();
            } else {
                $('.variant-container').slideUp();
            }
        });

        function getSubCategory(subId) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.getSubCategory') }}",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'subCategoryId': subId
                },
                success: function(response) {
                    $('#subCategory').empty();
                    $('#subCategory').append("<option value=''>--Select Category--</option>");
                    $.each(response.data, function(key, val) {
                        $('#subCategory').append("<option value='" + val.id + "'>" + val.subCategoryName + "</option>");
                    });
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred: ' + error);
                }
            });
        }

        document.getElementById('icon').onchange = function(evt) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('icondata').src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };

        document.getElementById('image1').onchange = function(evt) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image1data').src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };

        document.getElementById('image2').onchange = function(evt) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image2data').src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };

        document.getElementById('image3').onchange = function(evt) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image3data').src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };

        window.getSubCategory = getSubCategory;
    });
</script>

@endsection