<?php
$cal = New \CJ\Calender\Calender();

?>

<div class="container main">
    <div class="row">
        <div class="col-md-12">


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Måndag</th>
                    <th>Tisdag</th>
                    <th>Onsdag</th>
                    <th>Torsdag</th>
                    <th>Fredag</th>
                    <th>Lördag</th>
                    <th>Söndag</th>
                </tr>
            </thead>
            <tbody>
                <?= $cal->makeTableForMonth(); ?>
            </tbody>
        </table>

        <?= $cal->getCurrentDate(); ?>
        <?= $cal->dateTime->format("y-d-m"); ?>

        </div>
    </div>
</div>
