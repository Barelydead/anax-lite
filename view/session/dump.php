<?php
?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Dump</h1>
            <pre>
            <?= $app->session->dump(); ?>
            </pre>
        </div>
    </div>
</div>
