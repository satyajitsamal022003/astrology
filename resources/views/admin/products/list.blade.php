@extends('admin.layout')
@section('content')
<div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Manage Products</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Products</li>
                        </ul>
                    </div>
                    <div class="panel-heading col-md-2">
                        <a href="{{route('admin.addproduct')}}" class="btn btn-block btn-primary">Add Products</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="ProductTable" class="datatable table table-stripped">
                                    <thead>
                                    <tr>
                                        <th class="no-sort">Sl No.</th>
                                        <th>Name</th>
                                        <th class="no-sort">Image</th>
                                        <th class="no-sort">MRP Price</th>
                                        <th>B2C Price</th>
                                        <th class="no-sort">On Top</th>
                                        {{-- <th class="no-sort">On Footer</th> --}}
                                        <th class="no-sort">Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><a href="#">{{ $product->productName }}</a></td>
                                                <td>
                                                    <img src="{{ asset($product->image1 ?? 'assets/img/noImage.png') }}" alt="Product Image" style="height: 35px" />
                                                </td>
                                                <td><a href="#">{{ $product->priceMRP }}</a></td>
                                                <td>{{ $product->priceB2C }}</td>
                                                <td>
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="onoffswitch928" class="onoffswitch-checkbox" id="productOnTop{{ $product->id }}" tabindex="0" {{ $product->on_top ? 'checked' : '' }} onchange="toggleOnTop({{ $product->id }})">
                                                        <label class="onoffswitch-label" for="productOnTop{{ $product->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="onoffswitch928" class="onoffswitch-checkbox" id="productOnStatus{{ $product->id }}" tabindex="0" {{ $product->status ? 'checked' : '' }} onchange="toggleOnStatus({{ $product->id }})">
                                                        <label class="onoffswitch-label" for="productOnStatus{{ $product->id }}"></label>
                                                    </div>
                                                </td>
                                                <td class="center action">
                                                    <a href="{{ route('admin.editcat', $product->id) }}" class="btn btn-sm bg-success mr-2">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                    <a href="#" target="_blank" class="btn btn-sm bg-info mr-2">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm bg-danger mr-2" onclick="deleteProduct({{ $product->id }})">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                
                                                    
                                                    <form id="delete-form-{{ $product->id }}" action="{{ route('admin.deleteproduct', $product->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#ProductTable')) {
                $('#ProductTable').DataTable().destroy();
            }

            $('#ProductTable').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": 'no-sort' }
                ]
            });

            function toggleOnTop(productId) { 
                var isChecked = $('#productOnTop' + productId).is(':checked');
                var ontop = isChecked ? 1 : 0;

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.productOnTop') }}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'productId': productId,
                        'ontop': ontop
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('An error occurred: ' + error); 
                    }
                });
            }
            
            function toggleOnStatus(productId) { 
                var isChecked = $('#productOnStatus' + productId).is(':checked');
                var status = isChecked ? 1 : 0;

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.productOnStatus') }}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'productId': productId,
                        'status': status
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('An error occurred: ' + error); 
                    }
                });
            }

            window.toggleOnTop = toggleOnTop;
            window.toggleOnStatus = toggleOnStatus;
            window.deleteProduct = deleteProduct;

            function deleteProduct(id) {
                if (confirm('Are you sure you want to delete this Product?')) {
                    document.getElementById('delete-form-' + id).submit(); 
                }
            }
        });
    </script>
    @endsection
