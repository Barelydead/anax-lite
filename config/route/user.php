<?php

$app->router->add("login", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "login"]);
    $app->view->add("custom1/navbar");
    $app->view->add("login/login");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("change_password", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "login"]);
    $app->view->add("custom1/navbar");
    $app->view->add("login/change_password");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("edit_profile", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "login"]);
    $app->view->add("custom1/navbar");
    $app->view->add("login/edit_profile");
    $app->view->add("custom1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});


$app->router->add("welcome", function () use ($app) {
    $app->view->add("custom1/header", ["title" => "login"]);
    $app->view->add("custom1/navbar");
    $app->view->add("login/welcome");
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

                $app->cookie->set("savedCookieFromLogin", $userName);
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

$app->router->add("handle_edit_user", function () use ($app) {
    $app->db->connect();

    if (!$app->session->has("user")) {
        echo "you have to log in to alter your profile";
    } else {
        $username = $app->session->get("user");


        $name = isset($_POST["name"]) ? htmlentities($_POST["name"]) : null;
        $age = isset($_POST["age"]) ? htmlentities($_POST["age"]) : null;
        $profile = isset($_POST["profile"]) ? htmlentities($_POST["profile"]) : null;

        $sql = "UPDATE `anax_users` SET
    	`name` = '$name',
        `age` = $age,
        `profile` = '$profile'
        WHERE
        `username` = '$username'";


        $app->db->execute($sql, [$name, $age, $profile]);

        echo "Update success!";
    }
});


$app->router->add("logout", function () use ($app) {
    if ($app->session->has("user") || $app->session->has("admin")) {
        $app->session->destroy();
    }

    // Check if session is active
    $has_session = session_status() == PHP_SESSION_ACTIVE;

    if (!$has_session) {
        $app->cookie->destroy("savedCookieFromLogin");
        $app->redirect("");
    }

    echo "You are nog logged in yet.";
});

$app->router->add("handle_change_password", function () use ($app) {
    $app->db->connect();

    $new_pass = isset($_POST["new_pass"]) ? htmlentities($_POST["new_pass"]) : null;
    $re_new_pass = isset($_POST["re_new_pass"]) ? htmlentities($_POST["re_new_pass"]) : null;
    $old_pass = isset($_POST["old_pass"]) ? htmlentities($_POST["old_pass"]) : null;


    //logged in?
    if ($app->session->has("user")) {
        $username = $app->session->get("user");
        $oldPassHash = $app->db->getPassHash($username);
        //old pass correct?
        if (password_verify($old_pass, $oldPassHash)) {
            //new pass match?
            if ($new_pass == $re_new_pass) {
                $newHash = password_hash($new_pass, PASSWORD_DEFAULT);

                $sql = "UPDATE `anax_users` SET
                `password` = '$newHash'
                WHERE `username` = '$username'";

                $app->db->execute($sql);

                echo "successfully updated password for $username";

            } else {
                echo "passwords dont match";
            }
        } else {
            echo "old password incorrect";
        }
    } else {
        echo "you have to log in to alter your password";
    }
});
