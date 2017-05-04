<?php

namespace CJ\App;

/**
 * An App class to wrap the resources of the framework.
 */
class App
{


    public function redirect($url)
    {
        $thisUrl = $this->url->create($url);
        return header("Location: $thisUrl");
    }


    public function render($title, $view, $data = null)
    {
        $this->view->add("custom1/header", ["title" => "$title"]);
        $this->view->add("custom1/navbar");
        $this->view->add("$view", ["data" => $data]);
        $this->view->add("custom1/footer");

        $this->response->setBody([$this->view, "render"])
                      ->send();
    }



    /**
     * Help function to get order arrows for tables
     */
    public function orderBy($colId, $route)
    {
        return <<<EOD
        <span class='orderby'>
        <a href="{$route}?orderby={$colId}&order=asc">&darr;</a>
        <a href="{$route}?orderby={$colId}&order=desc">&uarr;</a>
        </span>
EOD;
    }

    /**
     * Use current querystring as base, extract it to an array, merge it
     * with incoming $options and recreate the querystring using the resulting
     * array.
     *
     * @param array  $options to merge into exitins querystring
     * @param string $prepend to the resulting query string
     *
     * @return string as an url with the updated query string.
     */


    public function mergeQueryString($options, $prepend = "?")
    {
        // Parse querystring into array
        $query = [];
        parse_str($_SERVER["QUERY_STRING"], $query);

        // Merge query string with new options
        $query = array_merge($query, $options);

        // Build and return the modified querystring as url
        return $prepend . http_build_query($query);
    }

        /**
     * Function to create links for sorting and keeping the original querystring.
     *
     * @param string $column the name of the database column to sort by
     * @param string $route  prepend this to the anchor href
     *
     * @return string with links to order by column.
     */
    public function orderby2($column)
    {
        $asc = $this->mergeQueryString(["orderby" => $column, "order" => "asc"]);
        $desc = $this->mergeQueryString(["orderby" => $column, "order" => "desc"]);

        return <<<EOD
    <span class="orderby">
    <a href="$asc">&darr;</a>
    <a href="$desc">&uarr;</a>
    </span>
EOD;
    }
}
