<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../common/common.css">
        <link rel="stylesheet" type="text/css" href="CSS/Style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="Scripts/Script.js"></script>
    </head>
    <body>
        <div>
            <select id="calendarType" onchange="showCalendars()">
                <option id='initialValue' value="">Choose Display</option>
                <option value="currentMonth">Current Month</option>
                <option value="selectedMonth">Select Month</option>
                <option value="currentYear">Current Year</option>
                <option value="selectedYear">Select Year</option>
                <option value="selectedMonthYear">Selected Month in Year</option>
            </select>
            <div id="selections">
                <select id="selectedMonth">
                    <!--putting in month options-->
                    <?php
                    $months = array("January", "February", "March", "April", 
                                "May", "June", "July", "August", "September", 
                                "October", "November", "December",);
                    $count = count($months);

                    for($i = 0; $i < $count; $i++)
                    {
                        echo "<option value='$i'>$months[$i]</option>";
                    }
                    ?>
                </select>
                <input type="text" id="selectedYear" value="YYYY" maxLength="4"
                       onfocus="yearFocus()" onblur="yearBlur()"/>
                <input type="button" id="enter" value="Enter"
                       onclick="doAjax()">
            </div>
        </div>
        <div id="calendar">
            
        </div>
        
        <?php
        $GLOBALS['paperFileName'] = "calendar2";
        include('../common/common.php');
        ?>
    </body>
</html>