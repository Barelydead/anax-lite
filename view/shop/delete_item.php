<?php
$params = getPost("id");

if (isset($_POST["delete"])) {
    $sql = "DELETE FROM `anax_product`
    WHERE id = ?";

    $app->db->execute($sql, [$params]);

    $app->redirect("shop/view_products");
}

if (isset($_POST["deactivate"])) {
    $sql = "UPDATE `anax_product` SET
    active_product = 0
    WHERE id = ?";

    $app->db->execute($sql, [$params]);

    $app->redirect("shop/view_products");
}

if (isset($_POST["activate"])) {
    $sql = "UPDATE `anax_product` SET
    active_product = 1
    WHERE id = ?";

    $app->db->execute($sql, [$params]);

    $app->redirect("shop/view_products");
}

?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>delete item</h1>
                    <div class="flex-item">
                        <img src="<?= $app->url->asset("$data->img"); ?>" alt="product image" class="product-image">
                        <p class="item-title"><?= $data->title ?></p>
                        <p class=""><?= $data->description ?></p>
                        <p class="price"><?= $data->price ?>kr</p>
                    </div>

            <form method="POST" action="">

                <input type="submit" name="delete" value="delete item" class="btn btn-danger">
                <input type="submit" name="deactivate" value="make item inactive" class="btn btn-default">
                <input type="submit" name="activate" value="make item active" class="btn btn-default">
                <input type="hidden" name="id" value="<?= $data->id ?>">

            </form>


        </div>
    </div>
</div>
