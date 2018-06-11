$(document).ready(function() {

    //Initialized
    var do_analysis_btn = $('#do-analysis-btn');
    var complaint_save_btn = $('#complaint-save-btn');
    var previous_step_2_btn = $('#previous-2-btn');
    var previous_step_3_btn = $('#previous-2-btn');
    var next_step_2_btn = $('#next-step-2-btn');
    var loading = $('.loaders');
    var analysis_info = $('#analysis-info');


    var process_error = $('.process-error');
    var process_success = $('.process-success');
    process_error.hide();
    process_success.hide();
    analysis_info.hide();

    var complaint = '';
    var complaint_analysis_data = null;
    //Add Procuts
    do_analysis_btn.on('click',function (event) {
        complaint = $('#complaint-input').val();
        previous_step_2_btn.hide();
        next_step_2_btn.hide();
        loading.show();
        if (complaint === '') {
            $('#complaint-input-info').html('<span style="color:red"> Please insert a complaint from previous page.</span>');
            loading.hide();
            previous_step_2_btn.show();

            console.error("Input filed is empty!");
        }else{
            $('#complaint-input-info').html('<span> Information about complaint that analysis..</span>');
            previous_step_2_btn.show();

            $.ajax({
                url: '/api/analysis',
                type: 'post',
                data: {
                    complaint: complaint
                },
                headers: {
                    Authorization: 'Bearer ' + token
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    complaint_analysis_data = data;
                    loading.hide();
                    if (data.cat_name != null){
                        $('#show-analysis-category').html("<label for='#'>Category:</label> <span>" + data.cat_name.toUpperCase() + "</span><br>");
                    }

                    if (data.product_name != null){
                        $('#show-analysis-product').html("<label for='#'>Product:</label> <span>" + data.product_name.toUpperCase() + "</span><br>");
                    }

                    if (data.product_model_name != null){
                        $('#show-analysis-product-model').html("<label for='#'>Product Model:</label> <span>" + data.product_model_name.toUpperCase() + "</span><br>");
                    }

                    if (data.branch_name != null){
                        $('#show-analysis-branch').html("<label for='#'>Branch:</label> <span>" + data.branch_name.toUpperCase() + "</span>");
                    }

                    next_step_2_btn.show();
                    previous_step_2_btn.show();

                    if(data.cat_id == null && data.product_id == null && data.product_model_id == null && data.branch_id == null){
                        $('#show-analysis-category').html("<label class='m-b-10' for='#'>No analysis data has been matched!</label>");
                        next_step_2_btn.hide();
                    }

                    analysis_info.show(500);
                }
            });
        }
    });

    previous_step_2_btn.on('click',function (event) {
        analysis_info.hide();
        $('#show-analysis-category').html("");
        $('#show-analysis-product').html("");
        $('#show-analysis-product-model').html("");
        $('#show-analysis-branch').html("");
    });

    next_step_2_btn.on('click',function (event) {
        //console.log(complaint_analysis_data);
        $('#complaint-last-seen-text').html(complaint);
    });

    previous_step_3_btn.on('click',function (event) {
        complaint_analysis_data = null;
    });

    complaint_save_btn.on('click',function (event) {
        console.log(complaint_analysis_data);
        $.ajax({
            url: '/api/analysis/create-statistics',
            type: 'post',
            data: {
                complaint: complaint_analysis_data
            },
            headers: {
                Authorization: 'Bearer ' + token
            },
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                $('#complaint-last-seen-text').html("<label>Analysis Saved.</label>");
                complaint_save_btn.hide();
            }
        });
    });
});