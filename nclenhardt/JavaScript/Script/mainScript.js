/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var canvas;
var dragging;
var x1;
var y1;

var color;

function init()
{
    canvas = document.getElementById("canvas");
    dragging = false;
    x1 = -1;
    y1 = -1;
    color = "black";
}

//drawing lines
function canvasDragStart(event)
{
    y1 = event.clientY;
    x1 = event.clientX;
    var rect = canvas.getBoundingClientRect();
    y1 -= rect.top;
    x1 -= rect.left;
    dragging = true;
}
function canvasDragEnd(event)
{
    if (!dragging)
        return;

    var y = event.clientY;
    var x = event.clientX;
    
    var rect = canvas.getBoundingClientRect();
    y -= rect.top;
    x -= rect.left;
    
    var height = y - y1;
    var width = x - x1;

    var length = hyp(width, height);
    var theta = Math.atan(height / width);
    var top = y1 + (length / 2 * Math.sin(theta));
    var left = x1 - (length / 2 * (1 - Math.cos(theta)));

    //arctan will only give angles from left-to-right
    //need to readjust if line goes right-to-left
    if (x < x1)
    {
        top = y + (length / 2 * Math.sin(theta));
        left = x - (length / 2 * (1 - Math.cos(theta)));
    }
    canvas.innerHTML +=
            "<div style='position:absolute; " +
            "top:" + top + "px; " +
            "left:" + left + "px; " +
            "height: 0px;" +
            "width:" + length + "px; " +
            "transform: rotate(" + theta + "rad);" +
            "border: 1px solid " + color + ";" +
            "'></div>";

    dragging = false;
}

function colorclick(event)
{
    color = event.target.style.backgroundColor;
    document.getElementById("textBox").style.color = color;
}

function clickCustomColor()
{
    document.getElementById("customColorChooser").click();
}

function addCustomColor(event)
{
    //declare necessary variables
    var colorDiv = document.getElementById("colorDiv");
    var numElements = colorDiv.childElementCount;
    
    //create a new color paragraph to add to colordiv
    var newElement = document.createElement("p");
    newElement.id = "color" + (numElements - 2);
    newElement.className = "color";
    newElement.setAttribute("onclick", "colorclick(event)");
    newElement.style.backgroundColor = event.target.value;
    
    //insert into colordiv, before button and hidden color input
    colorDiv.insertBefore(newElement, colorDiv.childNodes[numElements - 1]);
    
    //increase height of colorDiv if necessary
    if((colorDiv.childElementCount - 2) % 6 === 3)
    {
        var previousHeight = colorDiv.getBoundingClientRect().height;
         colorDiv.style.height = (previousHeight + 25) + "px"; 
    }
    
}

//adding text
function textAngleChanged(event)
{
    var num = event.target.value;
    document.getElementById("textAngle").value = num;
    document.getElementById("textAngleBox").value = num;
    document.getElementById("textBox").style.transform = "rotate(" + num + "deg)";
}

function textDragEnd(event)
{
    var box = event.target;
    var boxRect = box.getBoundingClientRect();
    var canvasRect = canvas.getBoundingClientRect();
    
    var theta = document.getElementById("textAngle").value * Math.PI / 180;
    
    var top = event.clientY - canvasRect.top - (boxRect.height / 2);
    var left = event.clientX - canvasRect.left - (boxRect.width / 2);
    
    canvas.innerHTML += 
            "<label style='position:absolute; "+
            " text-align:center;" +
            " top:" + top + "px;" +
            " left:" + left + "px;" +
            " height:" + boxRect.height + "px;" +
            " width:" + boxRect.width + "px;" +
            " transform: rotate(" + theta + "rad);" +
            " line-height: " + (boxRect.height) + "px;" +
            " overflow: visible;"+
            " color:" + color + ";" +
            " '>" + box.value + "</label>";
}

//adding images
function fileChosen(event)
{
    var image = document.getElementById("image");
    image.style.height = "auto";
    image.style.width = "auto";
    
    //mostly copied from the internet. uploads an image
    if (event.target.files && event.target.files[0]) 
    {
            var reader = new FileReader();

            reader.onload = function (e) 
            {
                var image = document.getElementById("image");
                
                image.setAttribute('src', e.target.result);
                
                var rect = image.getBoundingClientRect();
                var newHeight = rect.height;
                var newWidth = rect.width;

                document.getElementById("imageHeight").value = newHeight;
                document.getElementById("imageWidth").value = newWidth;
    
            };

            reader.readAsDataURL(event.target.files[0]);
    }
}

function imageDimensionsChanged()
{
    var newHeight = document.getElementById("imageHeight").value;
    var newWidth = document.getElementById("imageWidth").value;
    
    var image = document.getElementById("image");
    
    image.style.height = newHeight + "px";
    image.style.width = newWidth + "px";
    
}

function imageDragStart(event)
{
    var rect = event.target.getBoundingClientRect();
    y1 = event.clientY - rect.top;
    x1 = event.clientX - rect.left;
}

function imageDragEnd(event)
{
    var rect = canvas.getBoundingClientRect();
    var image = event.target;
    var newImage = document.createElement("img");
    newImage.src = image.src;
    newImage.style.position = "absolute";
    newImage.style.height = image.style.height;
    newImage.style.width = image.style.width;
    newImage.style.top = (event.clientY - rect.top - y1) + "px";
    newImage.style.left = (event.clientX - rect.left - x1) + "px";
    
    canvas.appendChild(newImage);
}

//helper functions
function hyp(num1, num2)
{
    return Math.sqrt(num1 * num1 + num2 * num2);
}
