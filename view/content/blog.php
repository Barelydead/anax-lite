<?php
$html = "";
foreach ($content as $post) {
        $post->data = $app->textfilter->filter(strip_tags($post->data), $post->filter);

        $html .= "
        <div class='row'>
            <div class='col-md-12'>
                <h1><a href='?page=$post->slug'>" . strip_tags($post->title) . "</a></h1>
                <p>published: $post->published</p>
                <p>{$post->data}</p>
                <hr>
            </div>
        </div>
        <hr>";
}

?>

<div class="container main">
        <?= $html ?>
</div>
