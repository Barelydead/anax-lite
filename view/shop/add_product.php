<?php
$params = getPost("title");

if (isset($_POST["add_item"])) {
    $sql = "INSERT INTO `anax_product`(`title`)
    VALUES (?)";

    $app->db->execute($sql, [$params]);
    $id = $app->db->lastInsertId();

    $sql = "INSERT INTO `anax_stock`(`product`, `units`)
    VALUES (?, ?)";

    $app->db->execute($sql, [$id, 0]);
    $app->redirect("shop/edit/$id");
}


?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Edit item</h1>

            <form method="POST" action="">
                <div class="form-group">
                    <label>title: </label>
                    <input type="text" name="title" class="form-control" value="" placeholder="Product name">
                </div>


                <input type="submit" name="add_item" value="Add" class="btn btn-default">
            </form>

        </div>
    </div>
</div>
