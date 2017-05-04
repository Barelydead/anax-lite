<?php

namespace CJ\Calender;

/**
 * Storing information from the request and calculating related essentials.
 */
class CalenderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test case to initiate through re-randomze an object.
     */
    public function testRandom()
    {
        $cal = new Calender();
        $this->assertEquals(13, $cal->months.length);
    }
}
