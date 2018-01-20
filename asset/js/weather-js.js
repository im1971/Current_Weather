
jQuery(document).ready(function ($) {

    $("#settings").hide();
    $(".style-fa").click(function () {
        $("#settings").toggle();
    });

    var passLocation = pass_location;
    //=========================================
    // default ajax call via shortcode location
    //=========================================

    // current weather
    $.ajax({

        url: "http://api.openweathermap.org/data/2.5/weather?q="+passLocation+"&units=metric"+"&APPID=a58bf6f48ce107c41ec3522a2ec59a8f",
        type:"Get",
        dataType:"jsonp",

        success: function (response) {
            var show_data = show_weather_data(response);
            $("#showAjaxData").html(show_data);
            $('#city').val('');
            $("#settings").hide();
        },
        error:function () {
            console.log("not done");
        }
    });

    // next five days weather
    $.ajax( {

        url: "http://api.openweathermap.org/data/2.5/forecast?q="+passLocation+"&units=metric&APPID=a58bf6f48ce107c41ec3522a2ec59a8f",
        type:"Get",
        dataType:"jsonp",

        success: function (data) {
            var show_five_data = show_weather_five_day_data(data);
            $("#showFiveDayAjaxData").html(show_five_data);
            $('#city').val('');
        },
        error:function () {
            console.log("not done");
        }
    });

    // ajax call for current weather
    $('#ajaxCall').click(function () {
        var city = $('#city').val();
            $.ajax({

                url: "http://api.openweathermap.org/data/2.5/weather?q="+city+"&units=metric"+"&APPID=a58bf6f48ce107c41ec3522a2ec59a8f",
                type:"Get",
                dataType:"jsonp",

                success: function (response) {
                    var show_data = show_weather_data(response);
                    $("#showAjaxData").html(show_data);
                    $('#city').val('');
                    $("#settings").hide();
                },
                error:function () {
                    console.log("not done");
                }
            });
    });


    // ajax call for five days weather
    $('#ajaxCall').click(function () {
        var city = $('#city').val();

            $.ajax( {

                url: "http://api.openweathermap.org/data/2.5/forecast?q="+city+"&units=metric&APPID=a58bf6f48ce107c41ec3522a2ec59a8f",
                type:"Get",
                dataType:"jsonp",

                success: function (data) {
                    var show_five_data = show_weather_five_day_data(data);
                    $("#showFiveDayAjaxData").html(show_five_data);
                    $('#city').val('');
                    $("#settings").hide();
                },
                error:function () {
                    console.log("not done");
                }
            });
    });
});

function show_weather_five_day_data(data) {

    return  "<li><img src='http://openweathermap.org/img/w/"+data.list[0].weather[0].icon+".png'>"+data.list[0].main.temp+"&deg;C</li>"+
            "<li><img src='http://openweathermap.org/img/w/"+data.list[5].weather[0].icon+".png'>"+data.list[5].main.temp+"&deg;C</li>"+
            "<li><img src='http://openweathermap.org/img/w/"+data.list[13].weather[0].icon+".png'>"+data.list[13].main.temp+"&deg;C</li>"+
            "<li><img src='http://openweathermap.org/img/w/"+data.list[21].weather[0].icon+".png'>"+data.list[21].main.temp+"&deg;C<li/>"+
            "<li><img src='http://openweathermap.org/img/w/"+data.list[29].weather[0].icon+".png'>"+data.list[29].main.temp+"&deg;C</li>"
}

function show_weather_data(response) {

    return "<h3>"+response.name+"</h3>"+
        "<p>"+response.weather[0].main+"</p>"+
        "<p style='font-size: 35px;'><img src='http://openweathermap.org/img/w/"+response.weather[0].icon+".png'>"+response.main.temp+"&deg;C</p>";
}

function initAutocomplete (){
    var input = document.getElementById("city");
    var autocomplete = new google.maps.places.Autocomplete(input);
}
google.maps.event.addDomListener(window, 'load', initAutocomplete);


/*
jQuery(document).ready(function($){
    var api = "http://api.openweathermap.org/data/2.5/forecast?q=Dhaka&units=metric&APPID=a58bf6f48ce107c41ec3522a2ec59a8f";
    // var api = "http:// api.openweathermap.org/data/2.5/forecast/daily?lat=35&lon=139&cnt=5&APPID=a58bf6f48ce107c41ec3522a2ec59a8f";

    $.getJSON(api, function(data){
        // alert(data.city.name);
        alert(data.list[0].main.temp);
        alert(data.list[5].main.temp);
        alert(data.list[13].main.temp);
        alert(data.list[21].main.temp);
        alert(data.list[29].main.temp);
    });
});

*/
