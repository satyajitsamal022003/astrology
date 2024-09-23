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
                                <table class="datatable table table-stripped">
                                    <thead>
                                    <tr>
                                        <th class="no-sort">Sl No.</th>
                                        <th>Name</th>
                                        <th class="no-sort">Image</th>
                                        <th class="no-sort">No Of Products</th>
                                        <th>Sort Order</th>
                                        <th class="no-sort">On Top</th>
                                        <th class="no-sort">On Footer</th>
                                        <th class="no-sort">Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="#"> Gemstones</a></td>
                                        <td>
                                            <img src="assets/img/noImage.png" alt="No Image" style="height: 35px"/>
                                        </td>
                                        <td><a href="#">150</a></td>
                                        <td>1</td>
                                        <td>
                                            <div class="onoffswitch">
                                                <input type="checkbox"
                                                       name="onoffswitch928"
                                                       class="onoffswitch-checkbox"
                                                       id="featured_productmyonoffswitch928"
                                                       tabindex="0">
                                                <label class="onoffswitch-label"
                                                       for="featured_productmyonoffswitch928"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="onoffswitch">
                                                <input type="checkbox"
                                                       name="onoffswitch928"
                                                       class="onoffswitch-checkbox"
                                                       id="on_topmyonoffswitch928" tabindex="0">
                                                <label class="onoffswitch-label"
                                                       for="on_topmyonoffswitch928"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="onoffswitch">
                                                <input type="checkbox"
                                                       name="onoffswitch928"
                                                       class="onoffswitch-checkbox"
                                                       id="myonoffswitch928" tabindex="0"
                                                       checked>
                                                <label class="onoffswitch-label"
                                                       for="myonoffswitch928"></label>
                                            </div>
                                        </td>
                                        <td class="center action">
                                            <a href="#"
                                               class="btn btn-sm bg-success mr-2">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="#" target="_blank"
                                               class="btn btn-sm bg-info mr-2">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm bg-danger mr-2">
                                                <i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
