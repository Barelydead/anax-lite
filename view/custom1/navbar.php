<?php
$app->session->has("user") ? $user = "logged in as: " . $app->session->get("user") : $user = "";
$app->session->has("admin") ? $user = "admin: " . $app->session->get("admin") : $user = "";
$logoutUrl = $app->url->create("logout");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 top-nav">
            <?= $app->navbar->getHTML(); ?>
            <p class="active-user"><?=$user?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 flash" style="background-image: url('<?= $app->image?>paint.jpeg?h=200&w=1200&crop-to-fit&area=15,0,0,0')">
        <h1 class="brand">This is ooPhp</h1>
        </div>
    </div>
</div>
