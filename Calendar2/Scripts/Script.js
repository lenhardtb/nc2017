/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function showCalendars()
{
    $("#selectedMonth").css("display", "none");
    $("#selectedYear").css("display", "none");
    $("#enter").css("display", "none");
    
    var selection = $("#calendarType option:selected").index();
    switch(selection)
    {
        case 0:
            return;
        case 2:
            $("#selectedMonth").css("display", "initial");
            $("#enter").css("display", "initial");
            break;
        case 4:
            $("#selectedYear").css("display", "initial");
            $("#enter").css("display", "initial");
            break;
        case 5:
            $("#selectedMonth").css("display", "initial");
            $("#selectedYear").css("display", "initial");
            $("#enter").css("display", "initial");
            break;
        default://current month or year
            doAjax();
    }
}

function action(selection)
{
    
}

function doAjax()
{
    var method, month, year;
    method = $("#calendarType option:selected").val();
    month = $("#selectedMonth option:selected").val();
    year = $("#selectedYear").val();
    
    ajax = $.ajax({
        url: 'API/Calendars.php',
        type: 'POST',
        data: {method: method, 
            month: month, 
            year: year}
    });
    ajax.done(ajaxCallBack);
    ajax.fail(function () {
        alert("Failure");
    });
}

function ajaxCallBack(responseIn)
{
    var response = JSON.parse(responseIn);
    $("#calendar").html(response);
    
    //ensure that there are four months across 
    //(which it does anyway ... if there are no months that span 5 weeks)
    var months = document.getElementsByClassName("monthDiv");
    for(var i = 0; i < 12; i++)
    {
        if(i % 4 === 0)
        {
            months[i].style.clear = "left";
        }
    }
    
}

function yearFocus()
{
    $("#selectedYear").val("");
}

function yearBlur()
{
    var box = $("selectedYear");
    if(box.val() === "")
        box.val("YYYY");
}