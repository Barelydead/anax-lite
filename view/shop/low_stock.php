<?php
?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Items with low stock count</h1>

            <table class="table">

                <thead>
                    <tr>
                        <th>Prod id</th>
                        <th>Prod name</th>
                        <th>Logged as low</th>
                        <th>units left</th>
                </thead>
                <tbody>
                    <?php foreach ($data as $item): ?>
                            <tr>
                                <td><?= $item->productId ?></td>
                                <td><?= $item->productName ?></td>
                                <td><?= $item->loggedDate ?></td>
                                <td><?= $item->unitsLeft ?></td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>


        </div>
    </div>
</div>
