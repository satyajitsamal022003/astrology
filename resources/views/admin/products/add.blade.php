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
                                    <a class="nav-link active" href="#product_tab" data-toggle="tab">Product</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#product_image_tab" data-toggle="tab">Product Image</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#product_description_tab" data-toggle="tab">Product Description</a>
                                </li>
                            </ul>

                            <form method="POST" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="product_tab">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <fieldset class="fieldset-style">
                                                    <div class="row">
                                                        <div class="col-xl-8">

                                                            <div class="form-group">
                                                                <label>Product Name </label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Product Name" name=""
                                                                       value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Product Small Name (To show on the
                                                                    variant)</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Product Small Name" name=""
                                                                       value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Category </label>
                                                                <select class="form-control" id="" name="">
                                                                    <option value="">--Select Category--</option>
                                                                    <option value="1"> Gemstones</option>
                                                                    <option value="2"> Rudraksha</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Sub Category (Optional) </label>
                                                                <select class="form-control" id="" name="">
                                                                    <option value="">--Select Sub Category--</option>
                                                                    <option value="1"> Blue Sapphire</option>
                                                                    <option value="2"> Yellow Sapphire</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Sort Order</label>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control" id=""
                                                                               placeholder="Sort Order All Product"
                                                                               name="" value="">
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control" id=""
                                                                               placeholder="Sort Order Category" name=""
                                                                               value="">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control" id=""
                                                                               placeholder="Sort Order Sub Category"
                                                                               name="" value="">
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control" id=""
                                                                               placeholder="Sort Order Popular" name=""
                                                                               value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="price_type">Price Per <span
                                                                            class="text-danger">*</span> </label>
                                                                    <select class="form-control" id="price_type"
                                                                            name="price_type">
                                                                        <option value="">--Select Price Per--
                                                                        </option>
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
                                                                        <input class="form-control"
                                                                               placeholder="Price MRP" name="" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <div class="form-group">
                                                                        <label>Price B2C</label>
                                                                        <input class="form-control"
                                                                               placeholder="Price B2C" name="" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <div class="form-group">
                                                                        <label>Price B2B</label>
                                                                        <input class="form-control"
                                                                               placeholder="Price B2B" name="" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label>Lower product range</label>
                                                                    <input type="number" class="form-control" id=""
                                                                           name=""
                                                                           value="">
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Higher product range</label>
                                                                    <input type="number" class="form-control" id=""
                                                                           name=""
                                                                           value="">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-2">
                                                                <div class="col-xl-12">
                                                                    <label for="out_of_stock"
                                                                           class="flex items-center">
                                                                        <input id="out_of_stock" type="checkbox"
                                                                               class="form-checkbox"
                                                                               name="">
                                                                        <span class="ml-2 text-sm text-gray-600">Product Out Of Stock</span>
                                                                    </label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">Certification</label>
                                                                <select class="form-control" id="" name="">
                                                                    <option>--Select--</option>
                                                                    <option value="1"> 250 (Amount)</option>
                                                                    <option value="2"> Free</option>
                                                                    <option value="3"> N/A</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Activation</label>
                                                                <select class="form-control" id="" name="">
                                                                    <option>--Select--</option>
                                                                    <option value="1"> 150 (Amount)</option>
                                                                    <option value="2"> Free</option>
                                                                    <option value="3"> N/A</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Courier Type</label>
                                                                <select class="form-control" id="" name="">
                                                                    <option>--Select--</option>
                                                                    <option value="1"> Free Delivery</option>
                                                                    <option value="2"> Low Weight</option>
                                                                    <option value="3"> Mid Weight</option>
                                                                    <option value="4"> Heavy Weight</option>
                                                                </select>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label for="add_variant"
                                                                                   class="flex items-center">
                                                                                <input id="add_variant" type="checkbox"
                                                                                       class="form-checkbox"
                                                                                       name="">
                                                                                <span class="ml-2 text-sm text-gray-600">have Variant?</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-xl-4">
                                                                            <button type="button"
                                                                                    class="bg-info btn text-white"><i
                                                                                    class="fa-regular fa-plus"></i> Add
                                                                                Variant
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="">Search Product For Variant</label>
                                                                        <div class="form-group d-flex align-items-center">
                                                                            <input class="form-control"
                                                                                   placeholder="Search Product and Select"
                                                                                   name="" value="">
                                                                            <button type="button"
                                                                                    class="btn text-white btn-sm bg-danger mr-2">
                                                                                <i class="fa-regular fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="">Search Product For Variant</label>
                                                                        <div class="form-group d-flex align-items-center">
                                                                            <input class="form-control"
                                                                                   placeholder="Search Product and Select"
                                                                                   name="" value="">
                                                                            <button type="button"
                                                                                    class="btn text-white btn-sm bg-danger mr-2">
                                                                                <i class="fa-regular fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="">Search Product For Variant</label>
                                                                        <div class="form-group d-flex align-items-center">
                                                                            <input class="form-control"
                                                                                   placeholder="Search Product and Select"
                                                                                   name="" value="">
                                                                            <button type="button"
                                                                                    class="btn text-white btn-sm bg-danger mr-2">
                                                                                <i class="fa-regular fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="">Search Product For Variant</label>
                                                                        <div class="form-group d-flex align-items-center">
                                                                            <input class="form-control"
                                                                                   placeholder="Search Product and Select"
                                                                                   name="" value="">
                                                                            <button type="button"
                                                                                    class="btn text-white btn-sm bg-danger mr-2">
                                                                                <i class="fa-regular fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="main-box seo-box">
                                                                <div class="inline-text">
                                                                    <p>Search Engine Listing Preview</p>
                                                                    <a href="javascript:" onclick="showseoedit()">Edit
                                                                        Website SEO</a>
                                                                </div>
                                                                <div class="box-content">
                                                                    <p id="seo_title"></p>
                                                                    <a id="seo_url" href=""></a>
                                                                    <span id="seo_description"></span>
                                                                </div>
                                                                <div class="seo-edit-box">
                                                                    <div class="form-group">
                                                                        <label>Meta Title </label>
                                                                        <input class="form-control" id="metaTitle"
                                                                               placeholder="Meta Title" name="metaTitle"
                                                                               value="">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Meta
                                                                            Description </label>

                                                                        <textarea id="metaDescription"
                                                                                  class="form-control "
                                                                                  placeholder="First Description"
                                                                                  name="metaDescription" cols="50"
                                                                                  rows="4"></textarea>

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Seo Url </label>
                                                                        <input class="form-control" id="seoUrl"
                                                                               placeholder="Seo Url" name="seoUrl"
                                                                               value="">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Meta Keyword </label>
                                                                        <input class="form-control" id="metaKeyword"
                                                                               placeholder="Meta Keyword"
                                                                               name="metaKeyword" value="">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Meta image </label>
                                                                        <input class="form-control" id="metaImage"
                                                                               placeholder="Meta image" name="metaImage"
                                                                               value="">
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
                                                        <input class="form-control imgInp" name="icon"
                                                               type="file">
                                                        <span style="color:red; font-style:italic;font-size:15px">Only JPG,png files are acceptable</span><br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img id="icon" class="preview" src="assets/img/preview.jpg">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Image1</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control imgInp" name="image1"
                                                               type="file">
                                                        <span style="color:red; font-style:italic;font-size:15px">Only JPG,png files are acceptable</span><br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img id="image1" class="preview" src="assets/img/preview.jpg">
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Image2</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control imgInp" name="image2"
                                                               type="file">
                                                        <span style="color:red; font-style:italic;font-size:15px">Only JPG,png files are acceptable</span><br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img id="image2" class="preview" src="assets/img/preview.jpg">
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Image3 </label>
                                                    <div class="col-md-8">
                                                        <input class="form-control imgInp" name="image3"
                                                               type="file">
                                                        <span style="color:red; font-style:italic;font-size:15px">Only JPG,png files are acceptable</span><br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img id="image3" class="preview" src="assets/img/preview.jpg">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <!--image seo start-->
                                                    <div class="main-box seo-box mt-3">
                                                        <div class="inline-text">
                                                            <p>Search Engine Image Preview</p>
                                                            <a href="javascript:" onclick="showseoimgedit()">Edit Image
                                                                SEO</a>
                                                        </div>
                                                        <div class="seo-img-edit-box">
                                                            <div class="form-group">
                                                                <label>Alternative Text</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Alternative Text" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Image Title</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Image Title" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Image Caption</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Image Caption" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-form-label">Image Description </label>
                                                                <textarea id="" class="form-control"
                                                                          placeholder="Description" name="" cols="50"
                                                                          rows="4"></textarea>

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
                                                            <a href="javascript:" onclick="showseoimgedit()">Edit Image
                                                                SEO</a>
                                                        </div>
                                                        <div class="seo-img-edit-box">
                                                            <div class="form-group">
                                                                <label>Alternative Text</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Alternative Text" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Image Title</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Image Title" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Image Caption</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Image Caption" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-form-label">Image Description </label>
                                                                <textarea id="" class="form-control"
                                                                          placeholder="Description" name="" cols="50"
                                                                          rows="4"></textarea>

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
                                                            <a href="javascript:" onclick="showseoimgedit()">Edit Image
                                                                SEO</a>
                                                        </div>
                                                        <div class="seo-img-edit-box">
                                                            <div class="form-group">
                                                                <label>Alternative Text</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Alternative Text" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Image Title</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Image Title" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Image Caption</label>
                                                                <input class="form-control" id=""
                                                                       placeholder="Image Caption" name="" value="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-form-label">Image Description </label>
                                                                <textarea id="" class="form-control"
                                                                          placeholder="Description" name="" cols="50"
                                                                          rows="4"></textarea>

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
                                                        <label>Heading 1 </label>
                                                        <input class="form-control" placeholder="Heading 1" name="" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description 1 </label>
                                                        <textarea type="text" class="form-control d-block" placeholder="Description 1"></textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Heading 2 </label>
                                                        <input class="form-control" placeholder="Heading 2" name="" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description 2 </label>
                                                        <textarea type="text" class="form-control d-block" placeholder="Description 2"></textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Heading 3 </label>
                                                        <input class="form-control" placeholder="Heading 3" name="" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description 3 </label>
                                                        <textarea type="text" class="form-control d-block" placeholder="Description 3"></textarea>
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
                                    <!--Description tab end-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
