<?php     

use Core\Router;

$router = new Router();


/////////////////////////////
// Register app routes
// Only GET and Post are available . Do not call $router->put() and others
/////////////////////////////




// index page
    $router->get("/", [Controllers\Product::class, "home"] );


// Add new product
    $router->post("/api/product/store", [Controllers\Product::class, "saveProduct"] );                    


// get list of all products
    $router->get("/api/product/all", [Controllers\Product::class, "getProducts"] );                    


// delete a product
    $router->get("/api/product/delete", [Controllers\Product::class, "deleteProduct"] );                    









// dispatch routes to Controllers
    $router->start();


?>