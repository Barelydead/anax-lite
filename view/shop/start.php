<div class="container main">
    <div class="row">
        <div class="col-md-12">
            <h1>Webshop</h1>

            <div class="form-group col-md-4">
                <label for="sel1">Order items by:</label>
                <select class="form-control" id="sel1">
                    <option>All items</option>
                    <option>A few items</option>
                    <option>other option</option>
                </select>
            </div>


            <div class="flex-container">
                <?php foreach ($data as $item): ?>
                        <div class="flex-item">
                            <a href="<?= $app->url->create("shop/item/$item->id") ?>" class="href-no-style">
                                <img src="<?= $app->url->asset("image/Maj.jpeg"); ?>" alt="product image" class="product-image">
                                <p class="item-title"><?= $item->title ?></p>
                                <p class="price"><?= $item->price ?>kr</p>
                            </a>
                        </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
