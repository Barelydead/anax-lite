<?php

namespace CJ\Calender;

/*
*   Calander class
*/
Class Calender
{

    /*
    *   Constructor
    */
    public function __construct()
    {
        $this->dateTime = New \dateTime();

        $this->months = ["Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September",
        "Oktober", "November", "December"];

        $this->daysPerMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        $this->days = ["Mon", "Tue", "Wed", "Thr", "Fredag", "Lördag", "Söndag"];
    }


    public function getCurrentDate() {
        return $this->dateTime->format("j");
    }


    public function getCurrentMonth() {
        return $this->dateTime->format("n");
    }


    public function monthStartsOn($year, $month) {
        $date = New \dateTime("$year-$month-1");
        return $date->format("N");
    }


    /*
    *   @param INT
    */
    public function makeTableForMonth() {
        $monthNr = $this->getCurrentMonth();

        $monthStart = 2;
        $html = "<tr>";
        $day = 1;
        $counter = 1;

        for ($i = 0; $i <= $this->daysPerMonth[0]; $i++) {
            if ($monthStart > $i) {
                $html .= "<td></td>";
            } else {
                ($counter % 7 == 1) ? $html .= "<tr>" : null;

                ($this->getCurrentDate() == $day) ? $current = "current" : $current = "";
                $html .= "<td class='$current'>$day</td>";

                ($counter % 7 == 0) ? $html .= "</tr>" : null;

                $day++;
            }
            $counter++;
        }

        $html .= "</tr>";

        return $html;
    }


}
// ($this->getCurrentDate() == $i) ? $current = "current" : $current = "";
// ($i % 7 == 1) ? $html .= "<tr>" : null;
// $html .= "<td class='$current'>$i</td>";
// ($i % 7 == 0) ? $html .= "</tr>" : null;
