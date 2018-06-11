@extends('admin.layouts.app')
@section('content')
    <!-- Wizard CSS -->
    <link href="/plugins/bower_components/register-steps/steps.css" rel="stylesheet">
    <link href="/cssWeb/loading.css" rel="stylesheet">

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Produtcs</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Admin</a></li>
                        <li class="active">Analysis</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="register-box">
                            <div class="">
                                <!-- multistep form -->
                                <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="eliteregister">
                                        <li class="active">Analysis Input</li>
                                        <li>Analysis Result</li>
                                        <li>Save</li>
                                    </ul>
                                    <!-- fieldsets -->
                                    <fieldset>
                                        <h2 class="fs-title">Enter COMPLAINT</h2>
                                        <textarea class="form-control" rows="5" id="complaint-input" placeholder="Enter complaint..."></textarea>
                                        <span>OR</span>
                                        <input type="file" class="m-t-15">
                                        <input type="button" name="next" class="next action-button" id="do-analysis-btn" value="Next" />
                                    </fieldset>

                                    <fieldset>
                                        <h2 class="fs-title">ANALYSIS Result</h2>
                                        <h3 class="fs-subtitle" id="complaint-input-info">Information about complaint that analysis.</h3>

                                        <div class="analysis-info-area">
                                            <!-- Loading -->
                                            <section class="loaders loaders-bg-4"><span class="loader loader-quart"><span> </span></span> Analysing</section>
                                            <!-- Loading -->

                                            <div id="analysis-info" style="position: relative; height: auto" class="m-b-10">


                                                <span id="show-analysis-category"></span>
                                                <span id="show-analysis-product"></span>
                                                <span id="show-analysis-product-model"></span>
                                                <span id="show-analysis-branch"></span>

                                            </div>
                                        </div>
                                        <input type="button" name="previous" class="previous action-button"  id="previous-2-btn" value="Previous" />
                                        <input type="button" name="next" class="next action-button" id="next-step-2-btn" value="Next" />
                                    </fieldset>

                                    <fieldset>
                                        <h2 class="fs-title">Save</h2>
                                        <h3 class="fs-subtitle">Do you want to save this analysis?</h3>
                                        <div class="m-b-10" id="complaint-last-seen-text">Samsung a5 2016 marka telefonu kullanıyorum. Telefonumun ekranı durduk yere telefonla ilgilenirken kapandı ve bir daha açılmadı şarja taktım bitmiştir diye açılmadı ama fena şekilde ısınmıştı. Küçükçekmece şubesinden almıştım hiç ilgilenmiyorlar.</div>
                                        <input type="button" name="previous" class="previous action-button" value="Previous" id="previous-3-btn" />
                                        <input type="submit" name="submit" class="submit action-button" id="complaint-save-btn" value="Save" />
                                    </fieldset>
                                </form>
                                <div class="clear"></div>
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
    <!-- Menu Plugin JavaScript -->
    <script src="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="/plugins/bower_components/register-steps/jquery.easing.min.js"></script>

    <script src="/plugins/bower_components/register-steps/register-init.js"></script>
    <script>
        var token = "{{$token}}";
    </script>
    <script src="/jsPages/analysisPage.js"></script>
@endsection