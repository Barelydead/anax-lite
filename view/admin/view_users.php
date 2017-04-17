<?php
if (!$app->session->has("admin")) {
    $app->redirect("admin_login");
}


$url = $app->url->create("view_users");
$max = count($app->db->executeFetchAll("SELECT `username` FROM `anax_users`"));

isset($_GET["orderby"]) ? $col = $_GET["orderby"] : $col = "username";
isset($_GET["order"]) ? $order = $_GET["order"] : $order = "desc";
isset($_GET["limit"]) ? $limit = $_GET["limit"] : $limit = 10;
isset($_GET["page"]) ? $page = $_GET["page"] : $page = 1;

$max = ceil($max / $limit);
$offset = $limit * ($page - 1);

?>

<div class="container">
    <div class="site-header">
        <h1>User</h1>
        <p>Users per page:
            <a href="<?= $app->mergeQueryString(["limit" => 2]) ?>">2</a> -
            <a href="<?= $app->mergeQueryString(["limit" => 5]) ?>">5</a> -
            <a href="<?= $app->mergeQueryString(["limit" => 10]) ?>">10</a>
        </p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>username <?=$app->orderBy2("username", $url)?></th>
                    <th>name <?=$app->orderBy2("name", $url)?></th>
                    <th>age <?=$app->orderBy2("age", $url)?></th>
                    <th>profile <?=$app->orderBy2("profile", $url)?></th>
                    <th>EDIT</th>
                </tr>
            </thead>

            <tbody>
                <?= $app->db->tableUsersSortedBy($col, $order, $limit, $offset) ?>
            </tbody>
        </table>
    </div>

    <p>
        Pages:
        <?php for ($i = 1; $i <= $max; $i++) : ?>
            <a href="<?= $app->mergeQueryString(["page" => $i]) ?>"><?= $i ?></a>
        <?php endfor; ?>
    </p>
</div>
