@extends('admin.layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Products</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Admin</a></li>
                        <li class="active">Products</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Products</div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="row process-error">
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m-b-20">
                                            <!-- Start an Alert -->
                                            <div style="padding: 10px" id="error-message" class="alert-danger"> <i class="fa fa-exclamation"></i> <span class="error-message"></span> </div>
                                        </div>
                                    </div>
                                    <div class="row process-success">
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m-b-20">
                                            <!-- Start an Alert -->
                                            <div style="padding: 10px" id="error-message" class="alert-success"> <i class="fa fa-exclamation"></i>  <span class="success-message"></span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" class="form-control" id="add-product-name" placeholder="Enter product name">
                                        </div>
                                        <div class="col-sm-2 col-md-2">
                                            <button class="btn btn-primary" id="product-add-button">Add</button>
                                            <button id="addModelModal" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addModel" data-whatever="@mdo">Add Model</button>

                                            <!-- Model Ekle Modal -->
                                            <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addSubCategoryLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="addSubCategoryLabel">Add Model To Product</h4> </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="row process-error">
                                                                    <div class="col-lg-12 col-sm-12 col-xs-12 m-b-20">
                                                                        <!-- Start an Alert -->
                                                                        <div style="padding: 10px" id="error-message" class="alert-danger"> <i class="fa fa-exclamation"></i> <span class="error-message"></span> </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row process-success">
                                                                    <div class="col-lg-12 col-sm-12 col-xs-12 m-b-20">
                                                                        <!-- Start an Alert -->
                                                                        <div style="padding: 10px" id="error-message" class="alert-success"> <i class="fa fa-exclamation"></i>  <span class="success-message"></span> </div>
                                                                    </div>
                                                                </div>
                                                                <label for="recipient-name" class="control-label">Select Product:</label>

                                                                <div id="draw-sub-categories">
                                                                </div>

                                                                <label for="recipient-name" class="control-label">Model Name:</label>
                                                                <input type="text" class="form-control" id="product_model_name"> </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button class="btn btn-success" id="add-model-button">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.model ekle modal -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Products List</div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <ul id="draw-products-list" style="width: 100%" >

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>

    </div>
@endsection
@section('scripts')
    <script src="/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script>
        var token = "{{$token}}";
    </script>
    <script src="/jsPages/productPage.js"></script>
@endsection