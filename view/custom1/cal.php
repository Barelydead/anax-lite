<?php
if (count($_GET) != 0) {
    $cal = $app->session->getOnce("calender");
} else {
    $cal = new \CJ\Calender\Calender();
}

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
            <div class="cal-button"><a href="?prev=true"><< </a></div>
            <div class="cal-button"><a href="?current=true">Current</a></div>
            <div class="cal-button"><a href="?next=true"> >></a></div>
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
