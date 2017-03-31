<?php

$activePage = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$navbar = [
    "config" => [
        "navbar-class" => "navbar"
    ],
    "items" => [
        "hem" => [
            "text" => "Start",
            "route" => "",
        ],
        "om" => [
            "text" => "Om",
            "route" => "about",
        ],
        "redovisning" => [
            "text" => "Redovisning",
            "route" => "report",
        ],
    ]
];

$navHtml = "";
foreach ($navbar as $array) {
    foreach ($array as $key => $val) {
        if ($key == "navbar-class") {
            $navHtml .= '<nav class="' . $val . '"><ul>';
        } else {
            $url = $app->url->create($val["route"]);

            if ($activePage == $url . "/") {
                $navHtml .= '<a href="' . $url . '"><li class="active">' . $val["text"] . '</li></a>';
            } else if ($activePage == $url) {
                $navHtml .= '<a href="' . $url . '"><li class="active">' . $val["text"] . '</li></a>';
            } else {
                $navHtml .= '<a href="' . $url . '"><li>' . $val["text"] . '</li></a>';
            }
        }
    }
}
$navHtml .= "</ul></nav>";

echo <<< EOD
<div class="container">
    <div class="row">
        <div class="col-lg-12 top-nav">
        $navHtml
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 flash" style="background-image: url('image/paint.jpeg?h=200&w=1200&crop-to-fit&area=15,0,0,0')">
        <h1 class="brand">This is ooPhp</h1>
        </div>
    </div>
</div>
EOD;
