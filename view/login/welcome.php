<?php
if (!$app->session->has("user")) {
    $loginURL = $app->url->create("login");
    header("Location: $loginURL");
}

?>

<div class="container main">
    <div class="row">
        <div class="col-md-12">
            <h1>Välkommen <?= $app->session->get("user") ?></h1>
            <p>Du har nu tillgång till din profil och kan redigera den bäst du vill</p>

        </div>
    </div>
</div>
