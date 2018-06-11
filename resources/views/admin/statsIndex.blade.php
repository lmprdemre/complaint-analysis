@extends('admin.layouts.app')
@section('content')
    <!-- Morris CSS -->
    <link href="/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Stats</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Admin</a></li>
                        <li class="active">Stats</li>
                    </ol>
                </div>
            </div>

            <!-- .row -->
            <div class="row">
                <!-- Top Categories Chart -->
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">TOP CATEGORIES</h3>
                        <div id="top-categories-chart"></div>
                    </div>
                </div>

                <!-- Top Products Chart -->
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">TOP PRODUCTS</h3>
                        <div id="top-products-chart"></div>
                    </div>
                </div>

                <!-- Top Branches Chart -->
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">TOP BRANCHES</h3>
                        <div id="top-branches-chart"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- .row -->
            <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">All Stats</div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <h3>CATEGORIES: </h3>
                                        @foreach($categoriesC as $category)
                                            <b>{{$category['name']}}</b> - <span>{{$category['c_count']}}</span> <br>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <h3>PRODUCTS: </h3>
                                        @foreach($productsC as $products)
                                            <b>{{$products['name']}}</b> - <span>{{$products['c_count']}}</span> <br>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <h3>PRODUCT MODELS: </h3>
                                        @foreach($productsMC as $productsM)
                                            <b>{{strtoupper($productsM['model_name'])}}</b> - <span>{{$productsM['c_count']}}</span> <br>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <h3>BRANCHES: </h3>
                                        @foreach($branchesC as $branches)
                                            <b>{{ucfirst($branches['name'])}}</b> - <span>{{$branches['c_count']}}</span> <br>
                                        @endforeach
                                    </div>
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

        var categoriesChart = JSON.parse('{!! $categoriesChart!!}');
        var productsChart = JSON.parse('{!! $productsChart!!}');
        var branchesChart = JSON.parse('{!! $branchesChart!!}');

    </script>
    <!--Morris JavaScript -->
    <script src="/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="/plugins/bower_components/morrisjs/morris.js"></script>
    <script src="/jsPages/statsPage.js"></script>
@endsection