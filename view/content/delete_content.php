<?php
$id = htmlentities(getGet("id"));
$param = [$id];

$content = $app->db->executeFetch("SELECT title FROM `anax_content` WHERE id = ?", $param);

if (isset($_POST["deleteContent"])) {
    $sql = "UPDATE `anax_content` SET
        deleted = NOW() WHERE id = ?";

    $app->db->execute($sql, $param);

    $app->redirect("content/view_content");
}
?>

<div class="container main">
    <div class="row">
        <div class="col-md-6">
            <h1>Edit</h1>

            <form method="POST" action="" id="profile">
                <div class="form-group">
                    <label>Title: </label>
                    <input type="text" name="title" class="form-control" value="<?=$content->title?>" readonly="">
                </div>

                <input type="submit" name="deleteContent" value="Delete" class="btn btn-default">
            </form>

        </div>
    </div>
</div>
