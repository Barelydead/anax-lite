<?php

$app->router->add("cookie", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Cookie"]);
    $app->view->add("custom1/navbar");
    $app->view->add("admin/cookie");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});


$app->router->add("admin_login", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Cookie"]);
    $app->view->add("custom1/navbar");
    $app->view->add("admin/login");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("view_users", function () use ($app) {
    $app->db->connect();

    $app->view->add("custom1/header", ["title" => "Cookie"]);
    $app->view->add("custom1/navbar");
    $app->view->add("admin/view_users");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("search_user", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Cookie"]);
    $app->view->add("custom1/navbar");
    $app->view->add("admin/search");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("edit_user_profile", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Cookie"]);
    $app->view->add("custom1/navbar");
    $app->view->add("admin/edit_user_profile");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});


$app->router->add("admin_validate", function () use ($app) {
    $app->db->connect();

    $userName = isset($_POST["admin"]) ? htmlentities($_POST["admin"]) : null;
    $pass = isset($_POST["pass"]) ? htmlentities($_POST["pass"]) : null;


    if ($userName != null && $pass != null) {
        // Check if username exists
        if ($app->db->exists("SELECT * FROM `anax_admin` WHERE `admin_name` = '$userName'")) {
            $get_hash = $app->db->executeFetchAll("SELECT password FROM `anax_admin` WHERE `admin_name` = '$userName'")[0]->password;
            // Verify user password
            if (password_verify($pass, $get_hash)) {
                $app->session->set("admin", $userName);

                $welcomeUrl = $app->url->create('admin_welcome');
                header("Location: $welcomeUrl");
            } else {
                // Redirect to login.php
                echo "User name or password is incorrect. <a href='" . $app->url->create('admin_login') . "'>try again</a>";
            }
        } else {
            // Redirect to login.php
            echo "No such user. <a href='" . $app->url->create('admin_login') . "'>try again</a>";
        }
    }
});

$app->router->add("admin_welcome", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "Cookie"]);
    $app->view->add("custom1/navbar");
    $app->view->add("admin/admin_welcome");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("postform_admin_edit", function () use ($app) {
    $app->db->connect();

    //edit
    if (isset($_POST["edit_profile"])) {
        $username = isset($_POST["username"]) ? htmlentities($_POST["username"]) : null;
        $name = isset($_POST["name"]) ? htmlentities($_POST["name"]) : null;
        $age = isset($_POST["age"]) ? htmlentities($_POST["age"]) : null;
        $profile = isset($_POST["profile"]) ? htmlentities($_POST["profile"]) : null;

        $sql = "UPDATE `anax_users` SET
        name = '$name',
        age = '$age',
        profile = '$profile'
        WHERE
        `username` = '$username'";

        $app->db->execute($sql, ["name", "age", "profile"]);

        echo "update success";
    }

    //change pw
    if (isset($_POST["change_password"])) {
        $pass = isset($_POST["password"]) ? htmlentities($_POST["password"]) : null;
        $repass = isset($_POST["repassword"]) ? htmlentities($_POST["repassword"]) : null;
        $username = isset($_POST["username"]) ? htmlentities($_POST["username"]) : null;


        if ($pass == $repass) {
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

            $sql = "UPDATE `anax_users` SET
            password = '$pass_hash'
            WHERE
            `username` = '$username'";

            $app->db->execute($sql, ["password"]);

            echo "update success";
        } else {
            echo "passwords does not match";
        }
    }

    //delete
    if (isset($_POST["delete_profile"])) {
        $username = isset($_POST["username"]) ? htmlentities($_POST["username"]) : null;

        $sql = "DELETE FROM `anax_users`
        WHERE username = '$username'
        LIMIT 1";

        $app->db->execute($sql);

        echo "successfully removed user";
    }
});
