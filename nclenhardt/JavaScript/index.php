<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <link rel='stylesheet' type='text/css' href='../common/common.css'/>
        <link rel="stylesheet" type="text/css" href="CSS/Main.css">
        
        <script src="Script/mainScript.js"></script>
    </head>
    <body onload="init()">
        <div id="canvas"
             onmousedown="canvasDragStart(event)" 
             onmouseup="canvasDragEnd(event)">

        </div>
        <div id="adderDiv">
            <div id="colorDiv">
                <?php
                $colors = array("Red", "Orange", "Yellow", "Green", "Blue", 
                    "Purple", "Black", "White");

                $count = count($colors);

                for ($i = 0; $i < $count; $i++)
                {
                    echo("<p id='color$i' "
                            . "class='color' "
                            . "onclick='colorclick(event)' "
                            . "style='background-color: $colors[$i];'"
                            . "></p>");
                }
                echo "<input id='customColorButton' type='button' onclick='clickCustomColor()' value='Add Custom'></input>";

                echo "<input id='customColorChooser' type='color' oninput='addCustomColor(event)'></input>";
                ?>
            </div>
            <div id="imageAdderDiv">
                <div id="imageDiv">
                    <img id="image" alt="Upload Image" ondragStart="imageDragStart(event)"ondragend="imageDragEnd(event)"/>
                </div>

                <div id="imageDimensionsDiv">
                    <span> Height: </span> 
                    <input id="imageHeight" type="number" oninput="imageDimensionsChanged(event)"/>
                    <span> Width: </span> 
                    <input id="imageWidth" type="number" oninput="imageDimensionsChanged(event)"/>
                </div>

                <input id="imageButton" type="file" onchange="fileChosen(event)" 
                       accept="image/gif, image/jpeg, image/png"/>
            </div>
            <div id="textAdderDiv">
                <div id="textBoxDiv">
                    <input id="textBox" type="text" draggable = "true" 
                           ondragend="textDragEnd(event)"></input>
                </div>
                <div id="textAngleDiv">
                    <input id="textAngleBox" type="text" columns="2" text="0"
                           value="0"
                           oninput="textAngleChanged(event)">&deg</input>
                    <input id="textAngle" type="range" min="-180" max="180" 
                           value="0"
                           oninput="textAngleChanged(event)"></input>
                </div>
            </div>
        </div>
        <?php
        $GLOBALS['paperFileName'] = "javascript";
        include('../common/common.php');
        ?>
    </body>
</html>
