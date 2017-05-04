<?php

$app->router->add("shop/**", function () use ($app) {
    if (!$app->session->has("admin")) {
        $app->redirect("admin_login");
    }

    $app->db->connect();
});

$app->router->add("shop/view_products", function () use ($app) {

    $data = $app->shop->getAllProducts();

    $app->render("CJ's Shop", "shop/view_products", $data);
});

$app->router->add("shop/edit/{id}", function ($id) use ($app) {

    $data = $app->shop->getItemWithId($id);

    $app->render("CJ's Shop", "shop/edit_item", $data);
});

$app->router->add("shop/delete/{id}", function ($id) use ($app) {

    $data = $app->shop->getItemWithId($id);

    $app->render("CJ's Shop", "shop/delete_item", $data);
});

$app->router->add("shop/change_stock/{id}", function ($id) use ($app) {

    $data = $app->shop->getStockForItem($id);


    $app->render("CJ's Shop", "shop/change_stock", $data);
});

$app->router->add("shop/add", function () use ($app) {


    $app->render("CJ's Shop", "shop/add_product");
});

$app->router->add("shop/low_stock", function () use ($app) {

    $data = $app->shop->getLowStock();

    $app->render("CJ's Shop", "shop/low_stock", $data);
});
