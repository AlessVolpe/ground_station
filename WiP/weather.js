var theUrl = "http://api.openweathermap.org/data/2.5/weather?q=Rome,IT&units=metric&appid=4149ce2d7232486f803ca6a89957b638";

function httpGet()
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    var info = xmlHttp.responseText;
    var weather = document.getElementById("weather");
    const j = JSON.parse(info);
    var temp = parseInt(j.main.temp);
    weather.innerHTML = j.weather[0].main + " · " + temp.toString() + " C°";
    document.getElementById("weather_icon").src = "http://openweathermap.org/img/wn/"+j.weather[0].icon+".png";
}

httpGet();
