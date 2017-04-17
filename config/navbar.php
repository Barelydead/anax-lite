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
            "sub" => [
                "kmom01" => [
                    "text" => "kmom01",
                    "route" => "report#kmom01"
                ],
                "kmom02" => [
                    "text" => "kmom02",
                    "route" => "report#kmom02"
                ],
                "kmom03" => [
                    "text" => "kmom03",
                    "route" => "report#kmom03"
                ]
            ]
        ],
        "session" => [
            "text" => "Session",
            "route" => "session",
        ],
        "kalender" => [
            "text" => "Kalender",
            "route" => "calander",
        ],
        "profile" => [
            "text" => "Profile",
            "route" => "user",
            "sub" => [
                "profile" => [
                    "text" => "My Profile",
                    "route" => "user"
                ],
                "Landing" => [
                    "text" => "Homescreen",
                    "route" => "welcome"
                ],
                "edit profile" => [
                    "text" => "Edit profile",
                    "route" => "edit_profile"
                ],
                "edit password" => [
                    "text" => "Change password",
                    "route" => "change_password"
                ],
                "Login" => [
                    "text" => "Login",
                    "route" => "login"
                ],
                "logout" => [
                    "text" => "Logout",
                    "route" => "logout"
                ]
            ]
        ],
        "admin" => [
            "text" => "Admin",
            "route" => "admin_welcome",
            "sub" => [
                "Login" => [
                    "text" => "Admin login",
                    "route" => "admin_login"
                ],
                "Logout" => [
                    "text" => "logout",
                    "route" => "admin_login"
                ],
                "view_users" => [
                    "text" => "view users",
                    "route" => "view_users"
                ],
                "search_user" => [
                    "text" => "search user",
                    "route" => "search_user"
                ]
            ]
        ]
    ]
];
