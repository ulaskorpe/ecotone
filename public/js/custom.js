function getProducts(){
    alert("fetches products from API");
    $.get( "/products/get-products", function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function listProducts(){

    $.get( "/products/list-products", function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function getWarehouses(){
    alert("fetches warehouses from API");
    $.get( "/warehouses/get-warehouses", function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function getOrders(){
    alert("fetches orders from API");
    $.get( "/orders/get-orders", function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function getSuppliers(){
    alert("fetches suppliers from API");
    $.get( "/suppliers/get-suppliers", function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function getVatGroups() {
    alert("fetches vatgroups from API");
    $.get( "/vatgroups/get-vatgroups", function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function createProduct(){

    $.get( "/products/create-product/", function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function updateProduct(idproduct){

    $.get( "/products/update-product/"+idproduct, function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function listStocks(idproduct){

    $.get( "/products/list-stocks/"+idproduct, function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function createStock(idproduct){

    $.get( "/products/create-stock/"+idproduct, function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function updateStock(idstock){

    $.get( "/products/update-stock/"+idstock, function( data ) {

        $( "#result" ).html( data );
        //alert( "Load was performed." );
    });
}

function deleteProduct(product_id){
    swal("Product will be deleted, are you sure?", {
        buttons: ["Cancel", "YES"],
        dangerMode: true,
    }).then((value) => {
        if (value) {
            //   console.log("{{url('orders/delete-order')}}/" + img_id);
            $.get("/products/delete-product/" + product_id, function (data) {
                swal("" + data);
                setTimeout(function () {
                    window.open('/listproducts', '_self');

                }, 2000);

                //   console.log(user_id+":"+follower_id);


            });


        }
    })
}

function deleteStock(idstock){
    swal("Stock will be deleted, are you sure?", {
        buttons: ["Cancel", "YES"],
        dangerMode: true,
    }).then((value) => {
        if (value) {
            //   console.log("{{url('orders/delete-order')}}/" + img_id);
            $.get("/products/delete-stock/" + idstock, function (data) {
                swal("" + data);
                setTimeout(function () {
                    window.open('/listproducts', '_self');

                }, 2000);

                //   console.log(user_id+":"+follower_id);


            });


        }
    })
}