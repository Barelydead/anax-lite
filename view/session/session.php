<?php

$increment = $app->url->create("session/increment");
$decrement = $app->url->create("session/decrement");
$status = $app->url->create("session/status");
$dump = $app->url->create("session/dump");
$destroy = $app->url->create("session/destroy");
?>


<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Session</h1>
            <h2 class="big-number"><?= $app->session->get("number") ?></h2>
            <a href="<?= $increment ?>"><button class="btn btn-success">increment</button></a>
            <a href="<?= $decrement ?>"><button class="btn btn-danger">decrement</button></a>
            <a href="<?= $status ?>"><button class="btn btn-primary">status</button></a>
            <a href="<?= $dump ?>"><button class="btn btn-primary">dump</button></a>
            <a href="<?= $destroy ?>"><button class="btn btn-primary">destroy</button></a>
        </div>
    </div>
</div>
