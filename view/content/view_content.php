<?php
$sql = "SELECT * FROM `anax_content`";
$resultset = $app->db->executeFetchAll($sql);

if (!$resultset) {
    return;
}
?>
<div class="container main">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Type</th>
                <th>Published</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Deleted</th>
            </tr>
        </thead>
        <tbody>
            <?= getTableBodyForContent($resultset, $app) ?>
        </tbody>
    </table>
</div>
