<?php

echo JSON_encode($_POST['method']());

function currentMonth()
{
    //uses date() function to determine info about current date
    //and a Date object to determine day of week of month's first day.
    $date = new DateTime(date("Y")."-".date("m")."-01");
    $startDayOfWeek = $date->format("w");
    
    //return an appropriately consrtucted month
    
    return month(date("t"), $startDayOfWeek, "");
}

function currentYear()
{
    return year(date("Y"));
}

function selectedMonth()
{
    $year = date("Y");
    $month = $_POST['month'];
    $date = new DateTime($year."-".($month + 1)."-01");
    $startDayOfWeek = $date->format("w");
    $numOfDays = 0;
    
    //determine number of days in month
    if($month == 2)         //february
    {
        $numOfDays = 28;

        if($year % 4 == 0 && $year % 1000 != 0)
        {
            $numOfDays = 29;
        }
    }
    else if($month % 2 == 1)//months with 31 days
    {
        $numOfDays = 31;
    }
    else                    //remaining months
    {
        $numOfDays = 30;
    }
    
    $months = array("January", "February", "March", "April", "May", "June", "July", 
    "August", "September", "October", "November", "December");
    
    return month($numOfDays, $startDayOfWeek, "$months[$month] $year");
}

function selectedYear()
{
    return year($_POST['year']);
}

function selectedMonthAndYear()
{
    $year = $_POST['year'];
    $months = array("January", "February", "March", "April", "May", "June", "July", 
    "August", "September", "October", "November", "December");
    $month = $_POST['month'] + 1;
    $date = new DateTime($year."-".$month."-01");
    $numOfDays = 0;
    $startDayOfWeek = $date->format("w");
    
    //determine number of days in month
    if($month == 2)         //february
    {
        $numOfDays = 28;

        if($year % 4 == 0 && $year % 1000 != 0)
        {
            $numOfDays = 29;
        }
    }
    else if($month % 2 == 1)//months with 31 days
    {
        $numOfDays = 31;
    }
    else                    //remaining months
    {
        $numOfDays = 30;
    }
    
    
    return month($numOfDays, $startDayOfWeek, "$months[month] $year");
}

function year($year)
{
    $months = array("January", "February", "March", "April", "May", "June", "July", 
    "August", "September", "October", "November", "December");
    
    //builds 12 calls of month() into returner then returns the massive string
    $returner = "<div class='year'>";
    $returner .= "<div class='yearHeader'>$year</div>";
    for($month = 1; $month <= 12; $month++)
    {
        $date = new DateTime($year."-".$month."-01");
        $startDayOfWeek = $date->format("w");
        
        $numOfDays = 0;
        if($month == 2)         //february
        {
            $numOfDays = 28;
            
            if($year % 4 == 0 && $year % 1000 != 0)
            {
                $numOfDays = 29;
            }
        }
        else if($month % 2 == 1)//months with 31 days
        {
            $numOfDays = 31;
        }
        else                    //remaining months
        {
            $numOfDays = 30;
        }
        
        $returner .= month($numOfDays, $startDayOfWeek, $months[$month - 1]);
    }
    $returner .= "</div>";
    
    return $returner;
}

/*
 * Generates a table representing a month, with the specified numer of days 
 * and the specified starting day of the week.
 */
function month($numDays, $startDayOfWeek, $monthName)
{
    $returner = "";
    
    $returner .= "<div class='monthDiv'>";
        
    if($monthName != "")
    {
        $returner .= "<div class='monthHeader'>$monthName</div>";
    }
    
    $returner .= "<table class='month'>";
    
    $returner .= "<tr class='week'>";
    
    //add blank beginning days
    for($i = 0; $i < $startDayOfWeek; $i++)
    {
        $returner .= "<td class='day'>";
        $returner .= "</td>";
    }
    
    //add days, starting new row when week ends
    for($i = 1; $i <= $numDays; $i++)
    {
        $returner .= "<td class='day'>";
        $returner .= $i;
        $returner .= "</td>";
        
        if(($i + $startDayOfWeek) % 7 === 0 && $i != $numDays)
        {
            $returner .= "</tr><tr class='week'>";
        }
    }
    
    //fill up last week - surroundng % 7 prevents results of 7
    $numRemainingDays = (7 - ($startDayOfWeek + $numDays) % 7) % 7;
    for($i = 0; $i < $numRemainingDays; $i++)
    {
        $returner .= "<td class='day'></td>";
    }
    
    $returner .= "</tr></table></div>";
    
    return $returner;
}