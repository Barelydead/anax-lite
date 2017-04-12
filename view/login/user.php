<?php
if (!$app->session->has("user")) {
    $loginURL = $app->url->create("login");
    header("Location: $loginURL");
}

 ?>

<div class="container main">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $user->username ?>s sida</h1>
            <p><?= $user->name ?> - <?= $user->age ?></p>


        </div>
    </div>
</div>
