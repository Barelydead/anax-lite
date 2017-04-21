<?php

$app->router->add("content/**", function () use ($app) {
    $app->db->connect();
});


$app->router->add("content/view_content", function () use ($app) {
    if (!$app->session->has("admin")) {
        $app->redirect("admin_login");
    }

    $app->render("All Content", "content/view_content");
});


$app->router->add("content/edit_content", function () use ($app) {
    if (!$app->session->has("admin")) {
        $app->redirect("admin_login");
    }

    $app->render("Edit content", "content/edit_content");
});


$app->router->add("content/add_content", function () use ($app) {
    if (!$app->session->has("admin")) {
        $app->redirect("admin_login");
    }

    $app->render("Add Content", "content/add_content");
});


$app->router->add("content/delete_content", function () use ($app) {
    if (!$app->session->has("admin")) {
        $app->redirect("admin_login");
    }

    $app->render("Add Content", "content/delete_content");
});

$app->router->add("content/view_pages", function () use ($app) {

    $app->render("Add Content", "content/view_pages");
});



$app->router->add("content/view", function () use ($app) {

    if (isset($_GET["path"])) {
        $path = htmlentities(getGet("path"));

        $sql = "SELECT * FROM `anax_content` WHERE path = ? and type = 'page'";

        $content = $app->db->executeFetch($sql, [$path]);

        $app->view->add("custom1/header", ["title" => "$content->title"]);
        $app->view->add("custom1/navbar");
        $app->view->add("content/view", ["content" => $content]);
        $app->view->add("custom1/footer");

        $app->response->setBody([$app->view, "render"])
                      ->send();
    } else {
        $app->redirect("content/view_pages");
    }

});

$app->router->add("content/blog", function () use ($app) {

    if (isset($_GET["page"])) {
        $page = htmlentities(getGet("page"));

        $sql = "SELECT * FROM `anax_content`
        WHERE `slug` = ? AND
        `published` <= current_timestamp AND
        (`deleted` IS NULL OR `deleted` > current_timestamp)";

        $content = $app->db->executeFetchAll($sql, [$page]);
    } else {
        $sql = "SELECT * FROM `anax_content`
        WHERE
        `type` = ? AND
        `published` <= current_timestamp AND
        (`deleted` IS NULL OR `deleted` > current_timestamp)
        ORDER BY `published` DESC";

        $content = $app->db->executeFetchAll($sql, ["post"]);
    }


    $app->view->add("custom1/header", ["title" => "Blog"]);
    $app->view->add("custom1/navbar");
    $app->view->add("content/blog", ["content" => $content]);
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();


});


$app->router->add("content/test_transform", function () use ($app) {

    $app->render("Filter preview", "content/test_transform");

});
