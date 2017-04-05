<?php
/*
* Config for navbar
*/
return [
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
        "session" => [
            "text" => "Session",
            "route" => "session",
        ],
        "kalender" => [
            "text" => "Kalender",
            "route" => "calander",
        ],
    ]
];
