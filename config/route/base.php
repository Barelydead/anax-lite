<?php
/**
 * Routes.
 */

$app->router->add("", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Home"]);
    $app->view->add("custom1/navbar");
    $app->view->add("custom1/home");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("about", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "About"]);
    $app->view->add("custom1/navbar");
    $app->view->add("custom1/about");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("report", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Report"]);
    $app->view->add("custom1/navbar");
    $app->view->add("custom1/report");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("calander", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Kalender"]);
    $app->view->add("custom1/navbar");
    $app->view->add("custom1/cal");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});




$app->router->add("status", function () use ($app) {

    // $data = [
    //     "Server" => php_uname(),
    //     "PHP version" => phpversion(),
    //     "Included files" => count(get_included_files()),
    //     "Memory used" => memory_get_peak_usage(true),
    //     "Execution time" => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],
    // ];

    $app->response->sendJson($_SERVER);
});
