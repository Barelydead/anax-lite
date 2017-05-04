<?php
$params = getPost(["title",
                "img",
                "category",
                "price",
                "description",
                "id"
            ]);

if (isset($_POST["edit_item"])) {
    $sql = "UPDATE `anax_product` SET
    title = ?,
    img = ?,
    category= ?,
    price = ?,
    description = ?
    WHERE id = ?";

    $app->db->execute($sql, array_values($params));

    $app->redirect("shop/change_stock/$data->id");
}


?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Edit item</h1>

            <form method="POST" action="" id="shop-item">
                <div class="form-group">
                    <label>title: </label>
                    <input type="text" name="title" class="form-control" value="<?=$data->title?>">
                </div>

                <div class="form-group">
                    <label>img: </label>
                    <input type="text" name="img" class="form-control" value="<?=$data->img?>">
                </div>

                <div class="form-group">
                    <label>category: </label>
                    <input type="text" name="category" class="form-control" value="<?=$data->category?>">
                </div>

                <div class="form-group">
                    <label>price: </label>
                    <input type="number" name="price" class="form-control" value="<?=$data->price?>">
                </div>

                <div class="form-group">
                    <label>description: </label>
                    <textarea class="form-control" rows="5" id="shop-item" name="description"><?=$data->description?></textarea>
                </div>

                <input type="hidden" name="id" value="<?=$data->id?>">

                <input type="submit" name="edit_item" value="Edit" class="btn btn-default">
            </form>

        </div>
    </div>
</div>
