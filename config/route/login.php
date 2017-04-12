<?php

$app->router->add("login", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "login"]);
    $app->view->add("custom1/navbar");
    $app->view->add("login/login");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});



$app->router->add("user", function () use ($app) {

    $app->db->connect();

    $user = $app->session->get('user');
    $sql = "SELECT * FROM `anax_users` WHERE `username` = '$user'";

    // Get user to send as a var to userpage
    $app->session->has("user") ? $userProfile = $app->db->executeFetchAll($sql)[0] : $userProfile = null;

    $app->view->add("custom1/header", ["title" => "login"]);
    $app->view->add("custom1/navbar");
    $app->view->add("login/user", ["user" => $userProfile]);
    $app->view->add("custom1/footer");


    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("new_user", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "login"]);
    $app->view->add("custom1/navbar");
    $app->view->add("login/create_user");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("handle_user", function () use ($app) {
    $app->db->connect();

    $newUserUrl = $app->url->create("new_user");
    $loginUrl = $app->url->create("login");

    $userName = isset($_POST["user"]) ? htmlentities($_POST["user"]) : null;
    $pass = isset($_POST["pass"]) ? htmlentities($_POST["pass"]) : null;
    $pass2 = isset($_POST["pass2"]) ? htmlentities($_POST["pass2"]) : null;
    $name = isset($_POST["name"]) ? htmlentities($_POST["name"]) : null;
    $age = isset($_POST["age"]) ? htmlentities($_POST["age"]) : null;


    if (!$app->db->exists("SELECT * FROM `anax_users` WHERE `username` = '$userName'")) {
        if ($pass == $pass2) {
            $passHash = password_hash($pass, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `anax_users`(`username`, `password`, `name`, `age`)
            	VALUES
                ('$userName',
                '$passHash',
                '$name',
                $age)";

            $app->db->execute($sql);
            echo "Succsess! Go to login page <a href='$loginUrl'>here</a>";
        } else {
            echo "Passwords does not match <a href='$newUserUrl'>try again</a>";
        }
    } else {
        echo "Username already exists <a href='$newUserUrl'>try again</a>";
    }
});

$app->router->add("validate", function () use ($app) {
    $app->db->connect();

    $userName = isset($_POST["user"]) ? htmlentities($_POST["user"]) : null;
    $pass = isset($_POST["pass"]) ? htmlentities($_POST["pass"]) : null;


    if ($userName != null && $pass != null) {
        // Check if username exists
        if ($app->db->exists("SELECT * FROM `anax_users` WHERE `username` = '$userName'")) {
            $get_hash = $app->db->executeFetchAll("SELECT password FROM `anax_users` WHERE `username` = '$userName'")[0]->password;
            // Verify user password
            if (password_verify($pass, $get_hash)) {
                $app->session->set("user", $userName);

                $welcomeUrl = $app->url->create('welcome');
                header("Location: $welcomeUrl");
            } else {
                // Redirect to login.php
                echo "User name or password is incorrect. <a href='" . $app->url->create('login') . "'>try again</a>";
            }
        } else {
            // Redirect to login.php
            echo "No such user. <a href='" . $app->url->create('login') . "'>try again</a>";
        }
    }


});


$app->router->add("welcome", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "login"]);
    $app->view->add("custom1/navbar");
    $app->view->add("login/welcome");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});
