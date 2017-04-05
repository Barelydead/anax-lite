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
                     $activePage = $this->app->request->getRoute();

                     if ($activePage == $url) {
                         $navHtml .= "<a href='$url'><li class='active'>$key</li></a>";
                     } else {
                         $navHtml .= "<a href='$url'><li>$key</li></a>";
                     }
                 }
             }
         }
         $navHtml .= "</ul></nav>";

         return $navHtml;
     }
}
