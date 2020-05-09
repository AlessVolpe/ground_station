//before running the code, be sure to execute the following tasks:
//1. commands on terminal (in the project root folder):
//   npm init --yes
//   npm install request --save
//   npm install dotenv --save
//   npm install fs --save
//2. create a .env file with openWeatherAPI={yourAPIkey}

require('dotenv').config()

var request = require('request');

var options = {
    url: 'http://api.openweathermap.org/data/2.5/weather?q=Rome,IT&units=metric&appid=' + process.env.openWeatherAPI,
}

var fs = require('fs');
function callback(error, response, body) {
    if (!error && response.statusCode == 200) {
        var info = JSON.parse(body);
        console.log('##############################');
        console.log(info);
        console.log('##############################');
        fs.writeFile('weather.json', JSON.stringify(info), function (err) {
            if (err) throw err;
            console.log('Saved!');
        console.log('##############################');

        request('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='+info.coord.lat+','+info.coord.lon+'&radius=500&types=food&key='+process.env.staticMapsAPI, function optionalCallback(err, httpResponse, body) {
            
            /*function initMap() {
                var myLatLng = {lat: info.coord.lat, lng: info.coord.lon};
              
                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 4,
                  center: myLatLng
                });
              
                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: 'Weather'
                });
              }
        //console.log(body);*/
    });
        });
    }
    else
        console.log('Error. Code ' + response.statusCode);
}

request.get(options, callback);