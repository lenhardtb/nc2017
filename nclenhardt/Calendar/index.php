<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calendar</title>
        <link rel='stylesheet' type='text/css' href='../common/common.css'/>
        <link rel="stylesheet" type="text/css" href="CSS/Main.css">
    </head>
    <body>
        <?php
        echo("<h1>The current date is: <br>" .date("D, F jS"). "</h1>");
        
        $day = date("j");
        $numOfDays = date("t");
        
        //calculate day of week of first day in month
        $firstDay = date("N") - ($day % 7);
        if($firstDay < 0)
        {$firstDay += 7;}
        
        echo("<div id = \"calendar\">");
        
        //add day of week indicators
        $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        
        for($i = 0; $i < 7; $i++)
        {
            echo("<p class = \"dayTop\">".$days[$i]."</p>");
        }
        
        //blank "days" so calendar starts off aligning correctly
        for($i = 0; $i < $firstDay; $i++)
        {
            echo("<p class = \"day\"></p>");
        }
        
        //put in a day for each day in the month
        for($i = 1; $i <= $numOfDays; $i++)
        {
            echo("<p ");
            
            if($i == $day){echo("id = \"currentDay\" ");}//today stands out
            
            echo("class=\"day\">".$i."</p>");
            
        }
        echo("</div>");
        ?>
        
        <?php
        $GLOBALS['paperFileName'] = "calendar";
        include('../common/common.php');
        ?>
    </body>
</html>
