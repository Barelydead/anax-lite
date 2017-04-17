<?php
if (!$app->session->has("user")) {
    $loginURL = $app->url->create("login");
    header("Location: $loginURL");
}


$editUrl = $app->url->create("edit_profile");
?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1><?= $user->username ?>s sida</h1>
            <p>name: <?= $user->name ?></p>
            <p>age: <?= $user->age ?></p>
            <hr>
            <h4>description</h4>
            <p><?= $user->profile ?></p>
            <p>SAVED COOKIE: <?= $app->cookie->dump() ?></p>
            <a href="<?=$editUrl?>" class="btn btn-primary">edit profile</a>

        </div>
    </div>
</div>
