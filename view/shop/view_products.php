<div class="container main">
    <div class="row">
        <div class="col-md-12">
            <h1>Webshop</h1>

            <a href="<?=$app->url->create("shop/add")?>">Create new product</a> |
            <a href="<?=$app->url->create("shop/low_stock")?>">Low stock</a>

            <table class="table">

                <thead>
                    <tr>
                        <th>id</th>
                        <th>Item name</th>
                        <th>decsription</th>
                        <th>price</th>
                        <th>units</th>
                        <th>img</th>
                        <th>category</th>
                        <th>status</th>
                        <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($data as $item): ?>
                            <tr>
                                <td><?= $item->id ?></td>
                                <td><?= $item->title ?></td>
                                <td><?= $item->description ?></td>
                                <td><?= $item->price ?></td>
                                <td><?= $item->stock ?></td>
                                <td><?= $item->img ?></td>
                                <td><?= $item->category ?></td>
                                <td><?= $item->status ?></td>
                                <td>
                                    <a href="<?= $app->url->create("shop/edit/$item->id") ?>">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?= $app->url->create("shop/delete/$item->id") ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?= $app->url->create("shop/change_stock/$item->id") ?>">
                                        <span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
            <!-- <div class="flex-container">
                <?php foreach ($data as $item): ?>
                        <div class="flex-item">
                            <a href="<?= $app->url->create("shop/item/$item->id") ?>" class="href-no-style">
                                <img src="<?= $app->url->asset("image/Maj.jpeg"); ?>" alt="product image" class="product-image">
                                <p class="item-title"><?= $item->title ?></p>
                                <p class="price"><?= $item->price ?>kr</p>
                            </a>
                        </div>
                <?php endforeach; ?>
            </div> -->

        </div>
    </div>
</div>
