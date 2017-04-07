<?php
$app->session->has("calender") ? $cal = $app->session->getOnce("calender") : $cal = new \CJ\Calender\Calender();

(isset($_GET["next"])) ? $cal->setNextMonth() : null;
(isset($_GET["prev"])) ? $cal->setPrevMonth() : null;
(isset($_GET["current"])) ? $cal->setCurrentMonth() : null;
?>

<div class="container main">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main cal">
            <div class="">
                <h1><?= $cal->months[$cal->getCurrentMonth()] ?> - <?= $cal->getCurrentYear() ?></h1>
            </div>
            <div class="image-holder" style="background-image: url('<?php echo  $app->image . $cal->getMonthImage();?>')">
            </div>

            <div class="button-holder">
            <span class="cal-button"><a href="?prev=true"><< prev</a></span>
            <span class="next cal-button"><a href="?next=true">next >></a></span>
            </div>

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
        </div>

    </div>
</div>
<?php
$app->session->set("calender", $cal);
?>
