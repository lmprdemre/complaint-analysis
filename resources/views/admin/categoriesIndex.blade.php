@extends('admin.layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Categories</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Admin</a></li>
                        <li class="active">Categories</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Categories</div>
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
                                        <div class="col-sm-11 col-md-11 col-lg-11">
                                            <input type="text" class="form-control" id="add-categories-name" placeholder="Enter category name">
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                            <button type="submit" class="btn btn-primary" id="add-categories-button">Add</button>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 m-t-20">
                                            <input type="text" class="form-control" id="add-categories-keywords" placeholder="Enter defined keywords with separated to spaces ( )">
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
                        <div class="panel-heading">Categories List</div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <ul id="draw-category-list" style="width: 100%" >

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
    <script src="/jsPages/categoriesPage.js"></script>
@endsection