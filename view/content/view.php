<?php



?>

<div class="container main">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1 class="db-title"><?= htmlentities($content->title) ?></h1>
            <span calss="db-updated">updated: <?= htmlentities($content->updated) ?></span>


            <div class="db-content">
                <?php echo $app->textfilter->filter(htmlentities($content->data), $content->filter);?>
            </div>

        </div>
    </div>
</div>
