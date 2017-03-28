<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Bo's Net-Centric Computing projects!</title>
        <link rel='stylesheet' type='text/css' href='Main.css'/>
        <link rel='stylesheet' type='text/css' href='common/common.css'/>
    </head>
    <body>
        <div id="header">
            <img id="headerImg" src="forest_header.png"/>
            <h1 id="headerText">Bo's Net-centric Computing projects!</h1>
        </div>
        <hr id="separator">
        <div id="main">
            <p>Most recent at top</p>
            <ul id="links">
                <?php
                $projects = array("Calendar2"=>"Calendar 2", 
                    "JavaScript"=>"Drawing Tool",
                    "Calendar"=>"Basic Calendar", 
                    "AdImitation"=>"Ad Imitation", 
                    "Webcomics1"=>"Webcomic Gallery", 
                    "FancyHelloWorld"=>"Fancy Hello World",
                    "HelloWorld"=>"\"Hello World!\" Application");

                $folders = array_keys($projects);
                $count = count($projects);

                for($i = 0; $i < $count; $i++)
                {
                    echo ("<li><a href='".$folders[$i]."/'>".$projects[$folders[$i]]."</a></li>\n");
                }
                ?>
                <li>More Coming Soon!</li>
            </ul>
            
        </div>
    </body>
</html>
