<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <link rel="stylesheet" href="../common/common.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="cookieArea">
            <p class="cookieInfo">
                2nd-largest auto insurer
            </p>
            <p class="cookieInfo">
                97% customer satisfaction
            </p>
            <p class="cookieInfo">
                24/7 licensed agents
            </p>
            <p class="cookieInfo">
                Helping people since 1936
            </p>
            
            <img id="cookies" src="imgFolder/cookies.PNG">
            
            <div>
            <img id="cookieGeicoImg" src="imgFolder/geico.PNG">
            <p id="cookieOtherGuy">
                The other guy.
            </p>
            </div>
        </div>
        <div id="infoArea">
            <p id="infoBig">
                The choice is yours, and it's simple.
            </p>
            <p id="infoLittle">
                Why enjoy just one cookie when there's a whole stack in front of you?
                <br><br>
                The same goes for car insurance. Why go with a company that offers just a low price when GEICO could save you hundreds and give you so muh more?
                You could enjoy satisfying professional sevice, 24/7, from a company that's made it their business to help people since 1936.
                This winning combination has helped GEICO to become the 2nd-largest private passenger auto insurer in the nation.
            </p>
        </div>
        <div id="geicoArea">
            <p id="geicoCatchphrase">
                Make the smart choice. Get your free quote from GEICO today.
            </p>
            <img id="geicoImg" src="imgFolder/geico.PNG">
            <p id="geicoInfo">
                geico.com | 1-800-947-AUTO | Local Office
            </p>
        </div>
        <div id="legalArea">
            <p id="legalInfo">
                Some discounts, coverages, payment plans, and features are not available in all states or all GEICO companies. 
                Customer satisfaction based on an independent study conducted by Alan Newman Research, 2015. 
                GEICO is the second-largest private passenger auto insurer in the United States according to the 2014 A.M. Best market share report, published April 2015. 
                GEICO is a registered service mark of Government Employees Insurance Company, Washington, DC, 20076; a Berkshire Hathaway subsidiary. 
                © 2016 GEICO
            </p>
        </div>
        <?php
        $GLOBALS['paperFileName'] = "adImitation";
        include('../common/common.php');
        ?>
    </body>
</html>
