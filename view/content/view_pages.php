<?php

$sql = "SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN 'isDeleted'
        WHEN (published <= NOW()) THEN 'isPublished'
        ELSE 'notPublished'
    END AS status,
    SUBSTRING(`data`, 1, 50) AS ingress
FROM anax_content
WHERE type=?";


$resultset = $app->db->executeFetchAll($sql, ["page"]);

?>


 <div class="container main">
     <div class="page-header">
         <h1>hej</h1>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>title</th>
                <th>id</th>
                <th>path</th>
                <th>slug</th>
                <th>ingress</th>
                <th>published</th>
                <th>created</th>
                <th>updated</th>
                <th>deleted</th>
                <th>status</th>
            <tr>
        </thead>
        <tbody>
            <?= getTableBodyForPages($resultset, $app) ?>
        </tbody>
    </table>

</div>
