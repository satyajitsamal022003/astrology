@extends('admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Sub Category</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.listsubcat') }}">Manage Sub Category</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Sub Category</li>
                        </ul>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.updateSubcat', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="categoryId">Category</label>
                    <select name="categoryId" id="categoryId" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $subcategory->categoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->categoryName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subCategoryName">Sub Category Name</label>
                    <input type="text" name="subCategoryName" class="form-control"
                        value="{{ $subcategory->subCategoryName }}" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="imageInput" onchange="previewImage(event)">
                    <small>Current Image: <img src="{{ asset($subcategory->image) }}" alt="Current Image"
                            style="height: 50px;"></small>
                    <div id="imagePreviewContainer" style="margin-top: 10px;">
                        <img id="imagePreview" src="" alt="Image Preview" style="display: none; height: 100px;"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sortOrder">Sort Order</label>
                    <input type="number" name="sortOrder" class="form-control" value="{{ $subcategory->sortOrder }}">
                </div>
                <div class="form-group">
                    <label for="sortOrder">Sort Order</label>
                    <input type="number" name="sortOrder" class="form-control" value="{{ $subcategory->sortOrder }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ $subcategory->description }}</textarea>
                </div>
                <div class="form-group">
                    <h5>Sub Category Status Off/On</h5>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch928" class="onoffswitch-checkbox" id="onoffswitch928"
                            {{ $subcategory->status == 0 ? 'checked' : '' }}>
                        <label class="onoffswitch-label" for="featured_productmyonoffswitch928"></label>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary">Update Sub Category</button>
            </form>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            
            if (event.target.files && event.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; 
                }
                
                reader.readAsDataURL(event.target.files[0]);
            } else {
                
                imagePreview.src = '';
                imagePreview.style.display = 'none';
            }
        }
    </script>
@endsection
