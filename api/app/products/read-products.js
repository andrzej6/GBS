$(document).ready(function(){
    showProducts();
    // show list of product on first load
    // when a 'read products' button was clicked
    $(document).on('click', '.read-products-button', function(){
        showProducts();
    });

});

// function to show list of products
function showProducts(){
    // get list of products from the API
    $.getJSON("http://getbritainstanding.org/api/product/read.php", function(data){

        // html for listing products
        readProductsTemplate(data, "");

        // chage page title
        changePageTitle("Read Products");

    });

}