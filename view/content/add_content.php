<?php
$param = [getPost("title")];

if (isset($_POST["addContent"])) {
    $sql = "INSERT INTO `anax_content`(`title`) VALUES (?)";

    $app->db->execute($sql, $param);

    $id = $app->db->lastInsertId();
    $app->redirect("content/edit_content?id=$id");
}


?>

<div class="container main">
    <div class="row">
        <div class="col-md-6">
            <h1>Add new content page</h1>

            <form method="POST" action="" id="profile">
                <div class="form-group">
                    <label>Title: </label>
                    <input type="text" name="title" class="form-control" value="">
                </div>

                <input type="submit" name="addContent" value="Add" class="btn btn-default">
            </form>

        </div>
    </div>
</div>
