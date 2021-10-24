function getProducts(){
    alert("fetches products from API");
    $.get( "/products/get-products", function( data ) {

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