<?php

if (isset($_POST["change"])) {

    $units = getPost("units");

    $app->shop->changeStock($units, $data->productId);

    $app->redirect("shop/change_stock/$data->productId");
}

?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Change Stock</h1>
            <div class="flex-item">
                <p class="item-title"><?= $data->productName ?></p>
                <p class="price"><?= $data->productDesc ?></p>
                <p class="stock">Current stock: <span class="big"><?= $data->units ?></span></p>

                <form method="POST" action="">
                    <div class="form-group">
                        <label>units: </label>
                        <input type="number" name="units" class="form-control" value="" placeholder="eg 10 or -10">
                    </div>

                    <input type="submit" name="change" value="change stock" class="btn btn-default">
                </form>


            </div>
        </div>
    </div>
</div>
