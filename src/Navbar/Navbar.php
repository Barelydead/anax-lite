<?php

namespace CJ\Navbar;

/**
 * Class to generate HTMLnavbar from array.
 */
class Navbar implements \Anax\Common\ConfigureInterface, \Anax\Common\AppInjectableInterface
{

    use \Anax\Common\ConfigureTrait;
    use \Anax\Common\AppInjectableTrait;

    /**
      * Get HTML for the navbar.
      * @return string as HTML with the navbar.
      */
    public function getHTML()
    {
        $items = $this->config;
        $navHtml = "";


        foreach ($items as $array) {
            foreach ($array as $key => $val) {
                if ($key == "navbar-class") {
                    $navHtml .= '<nav class="' . $val . '"><ul>';
                } else {
                    $url = $this->app->url->create($val["route"]);
                    $activePage = $this->app->request->getCurrentUrl();
                    $activePage == $url ? $active = "active" : $active = "";

                    $navHtml .= "<div class='main-button-holder'>";
                    $navHtml .= "<a href='$url'><li class='$active'>" . $val["text"] . "</li></a>";

                    if (isset($val["sub"])) {
                        $navHtml .= "<div class='sub'>";
                        foreach ($val["sub"] as $subArray) {
                            $subUrl = $this->app->url->create($subArray["route"]);
                            $navHtml .= "<a href='" . $subUrl . "' class='sublink'>" . $subArray["text"] . "</a>";
                        }
                        $navHtml .= "</div>";
                    }

                    $navHtml .= "</div>";
                }
            }
        }
        $navHtml .= "</ul></nav>";

        return $navHtml;
    }
}
