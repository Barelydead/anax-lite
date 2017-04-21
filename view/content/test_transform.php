<?php

$text = "Först lite vanlig text följt av en tom rad.

Då tar vi ett nytt stycke med lite bbcode med [b]bold[/b] och [i]italic[/i] samt en [url=https://dbwebb.se]länk till dbwebb[/url].

Sen testar vi en länk till https://dbwebb.se som skall bli klickbar.

Avslutningsvis blir det en [länk skriven i markdown](https://dbwebb.se) och länken leder till dbwebb.

Avsluter med en lista som formatteras till ul/li med markdown.

* Item 1
* Item 2"

?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <h4>Text with all filter</h4><br>
            <?=$app->textfilter->filter($text, "nl2br,bbcode,markdown")?>
            <br>
            <h4>Text with bbcode</h4><br>
            <?=$app->textfilter->bbcode($text)?>
            <br>
            <h4>Text with markdown</h4><br>
            <?=$app->textfilter->markdown($text)?>
            <br>
            <h4>Original text</h4><br>
            <?=$text?>
            <br>

        </div>
    </div>
</div>
