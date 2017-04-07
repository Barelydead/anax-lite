<?php
$app->router->add("session", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Session"]);
    $app->view->add("custom1/navbar");
    $app->view->add("session/session");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("session/increment", function () use ($app) {

    if ($app->session->has("number")) {
        $app->session->set("number", $app->session->get("number") + 1);
    } else {
        $app->session->set("number", 0);
    }

    $app->session->dump();
    $sessionURL = $app->url->create("session");
    header("Location: $sessionURL");
});

$app->router->add("session/decrement", function () use ($app) {

    if ($app->session->has("number")) {
        $app->session->set("number", $app->session->get("number") - 1);
    } else {
        $app->session->set("number", 0);
    }

    $sessionURL = $app->url->create("session");
    header("Location: $sessionURL");
});

$app->router->add("session/status", function () use ($app) {

    $data = [
        "session_name" => session_name(),
        "session_id" => session_id(),
        "session_abort" => session_abort(),
        "session_status" => session_status(),
        "session_encode" => session_encode()
    ];

    $app->response->sendJson($data);
});

$app->router->add("session/dump", function () use ($app) {

    $app->view->add("custom1/header", ["title" => "Session_dump"]);
    $app->view->add("custom1/navbar");
    $app->view->add("session/dump");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("session/destroy", function () use ($app) {
    $app->session->destroy();

    $sessionURL = $app->url->create("session/dump");
    header("Location: $sessionURL");
});
