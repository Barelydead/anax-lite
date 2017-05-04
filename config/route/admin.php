<?php

$app->router->add("admin_login", function () use ($app) {
    $app->render("Admin login", "admin/login");
});

$app->router->add("view_users", function () use ($app) {
    $app->db->connect();

    $app->render("View users", "admin/view_users");
});

$app->router->add("search_user", function () use ($app) {
    $app->render("search users", "admin/search");
});

$app->router->add("edit_user_profile", function () use ($app) {
    $app->render("edit user profile", "admin/edit_user_profile");
});

$app->router->add("admin_welcome", function () use ($app) {
    $app->render("Welcome", "admin/admin_welcome");
});

$app->router->add("add_user", function () use ($app) {
    $app->render("Welcome", "admin/add_user");
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

        $app->redirect("view_user");
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
            $app->redirect("view_user");
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

        $app->redirect("view_users");
    }
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
                $app->session->delete("user");
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
