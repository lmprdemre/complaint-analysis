$(document).ready(function() {

    //Initialized
    var categoryArray = [];
    var productsArray = [];
    var branchesArray = [];

    //Assign values and label from PHP.
    for (var i = 0; i<categoriesChart.length;i++){
        //console.log(categories[i].name);
        categoryArray[i] = {
            'label' : categoriesChart[i].name,
            'value' : categoriesChart[i].c_count
        };
    }

    for (var i = 0; i<productsChart.length;i++){

        productsArray[i] = {
            'label' : productsChart[i].name,
            'value' : productsChart[i].c_count
        };
    }

    for (var i = 0; i<branchesChart.length;i++){

        branchesArray[i] = {
            'label' : branchesChart[i].name,
            'value' : branchesChart[i].c_count
        };
    }

    //Top categories chart
    Morris.Donut({
        element: 'top-categories-chart',
        data: categoryArray,
        resize: true,
        colors:['#99d683', '#13dafe', '#6164c1']
    });

    //Top products chart
    Morris.Donut({
        element: 'top-products-chart',
        data: productsArray,
        resize: true,
        colors:['#99d683', '#13dafe', '#6164c1']
    });

    //Top branches chart
    Morris.Donut({
        element: 'top-branches-chart',
        data: branchesArray,
        resize: true,
        colors:['#99d683', '#13dafe', '#6164c1']
    });
});