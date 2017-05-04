<?php


namespace CJ\Textformat;

/*
* Textformat class for handling content text
*/

class Textformat implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;

    public $filters = [
        "bbcode",
        "markdown",
        "nl2br",
        "link"
    ];


    /*
    * Converts and returns text with /n, /r to <br>
    */
    public function convertBreak($text)
    {
        return nl2br($text);
    }


    /*
    *
    */
    public function bbcode($text)
    {
        $patterns = [
            '/\[b\](.*?)\[\/b\]/is',
            '/\[i\](.*?)\[\/i\]/is',
            '/\[u\](.*?)\[\/u\]/is',
            '/\[img\](https?.*?)\[\/img\]/is',
            '/\[url\](https?.*?)\[\/url\]/is',
            '/\[url=(https?.*?)\](.*?)\[\/url\]/is'
        ];

        $replacements = [
            '<strong>$1</strong>',
            '<em>$1</em>',
            '<u>$1</u>',
            '<img src="$1" />',
            '<a href="$1">$1</a>',
            '<a href="$1">$2</a>'
        ];

        return preg_replace($patterns, $replacements, $text);
    }

    /*
    *
    */
    public function makeClickable($text)
    {
        $patterns = [
            "/(http:\/\/)\S+/",
            "/(https:\/\/)\S+/"
        ];

        $replacements = [
            '<a href="${0}">${0}</a>',
            '<a href="${0}">${0}</a>'
        ];

        return preg_replace($patterns, $replacements, $text);
    }



    /*
    * returns filtered string
    */
    public function markdown($text)
    {
        $text = \Michelf\MarkdownExtra::defaultTransform($text);
        $text = \Michelf\SmartyPantsTypographer::defaultTransform(
            $text,
            "2"
        );
        return $text;
    }


    /*
    * @params $text(string), $filter(comma seperated string)
    * returns filtered text string
    */
    public function filter($text, $csvfilter)
    {
        $filterArray = explode(",", $csvfilter);


        foreach ($filterArray as $filter) {
            switch ($filter) {
                case "nl2br":
                    $text = $this->convertBreak($text);
                    break;

                case "bbcode":
                    $text = $this->bbcode($text);
                    break;

                case "markdown":
                    $text = $this->markdown($text);
                    break;

                case "link":
                    $text = $this->makeClickable($text);
                    break;

                default:
                    break;
            }
        }

        return $text;
    }
}
