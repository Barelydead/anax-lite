<?php
$app->db->connect();
$sql = "SELECT * FROM `anax_content` WHERE type = ?";

$tryp = $app->db->executeFetchAll($sql, ["block"]);

?>


<div class="container">
    <div class="row footer">
        <div class="col-md-4">
            <span class="copyright"><?=$app->textfilter->filter($tryp[0]->data, $tryp[0]->filter)?></span>
        </div>
        <div class="col-md-4">
            <span class="copyright"><?=$app->textfilter->filter($tryp[1]->data, $tryp[1]->filter)?></span>
        </div>
        <div class="col-md-4">
            <span class="copyright"><?=$app->textfilter->filter($tryp[2]->data, $tryp[2]->filter)?></span>
        </div>
    </div>
</footer>

<!-- Close site-wrapper -->
</div>
