<?php

namespace CJ\Calender;

/**
 * Test class for Calander
 */
class CalenderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test case for init of new object
     */
    public function testInit()
    {
        $cal = new Calender();
        $this->assertInstanceOf("\CJ\Calender\Calender", $cal);
        $this->assertEquals(13, count($cal->months));
        $this->assertEquals(13, count($cal->daysPerMonth));
    }

    /**
     * Test case for init of new object
     */
    public function testMethods()
    {
        $cal = new Calender();
        $cal2 = new Calender();

        $this->assertTrue(is_string($cal->getMonthImage()));

        $this->assertTrue(is_numeric($cal->monthStartsOn()));

        $this->assertTrue(is_numeric($cal->getCurrentDate()));


        $this->assertEquals($cal->dateTime, $cal2->dateTime);

        $cal->setPrevMonth();
        $this->assertNotEquals($cal->dateTime, $cal2->dateTime);

        $cal->setCurrentMonth();
        $this->assertEquals($cal->dateTime, $cal2->dateTime);

        $cal->setNextMonth();
        $this->assertNotEquals($cal->dateTime, $cal2->dateTime);


        $this->assertTrue(is_string($cal->makeTableForMonth()));
    }
}
