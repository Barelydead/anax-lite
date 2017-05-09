<?php

namespace CJ\Textformat;

/**
 * Storing information from the request and calculating related essentials.
 */
class TextformatTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test case for init of new object
     */
    public function testInit()
    {
        $filter = new Textformat();

        $this->assertInstanceOf("\CJ\Textformat\Textformat", $filter);
    }


    /**
     * Test cases for class methods
     */
    public function testMethods()
    {
        $filter = new Textformat();

        $text = "hej
        test
        [b]hej[/b]
        http://hejsan.se
        **hejsan**";

        $this->assertTrue(strpos($filter->convertBreak($text), "<br />") !== false);
        $this->assertTrue(strpos($filter->bbcode($text), "<strong>") !== false);
        $this->assertTrue(strpos($filter->makeClickable($text), "href") !== false);
        $this->assertTrue(strpos($filter->markdown($text), "<p>") !== false);

        $formatted = $filter->filter($text, "nl2br,bbcode,link,markdown");
        $this->assertTrue(strpos($formatted, "<strong>") !== false);
        $this->assertTrue(strpos($formatted, "href") !== false);
        $this->assertTrue(strpos($formatted, "<br />") !== false);

        $formatted2 = $filter->filter($text, "wrong");
        $this->assertEquals($formatted2, $text);
    }



}
