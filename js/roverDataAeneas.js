// this is a proof-of-concept script, it will be used just to display Real Time data on the HTML page

// a set of variables used as a range for random values
var minBattery = 0;
var maxBattery = 100;
var minSpeed = 0;
var maxSpeed = 8;
var minXcoords = 12.504315;
var maxXcoords = 12.5722932;
var minYcoords = 41.7656441;
var maxYcoords = 41.89764;
var minTilt = -60;
var maxTilt = 60;

var attitude = $.flightIndicator("#attitude", "attitude", {
  roll: 50,
  pitch: -20,
  size: 200,
  showBox: true,
});
var altimeter = $.flightIndicator("#altimeter", "altimeter");
var increment = 0;

// variables initialized for code clarity
var speed = document.getElementById("speedRT");
var battery = document.getElementById("batteryRT");
var xCoords = document.getElementById("xCoordsRT");
var yCoords = document.getElementById("yCoordsRT");
var tilt = document.getElementById("cameraTiltRT");

// Attitude initialized
attitude.setRoll(10 * Math.sin(increment / 2));
attitude.setPitch(10 * Math.sin(increment / 4));

// Altimeter initialized
altimeter.setAltitude(10 * increment);
altimeter.setPressure(1000 + 3 * Math.sin(increment / 50));

function roverData() {

  document.getElementById("autoRover02").disabled = true; // disables auto button
    // sets a localStorage variable an then puts it into the rover status span
    window.localStorage.setItem("rover02status", "Running (auto)");
    document.getElementById(
      "rover02status"
    ).innerText = window.localStorage.getItem("rover02status");

  // Battery update
  maxBattery = maxBattery - 0.05;
  if (maxBattery > minBattery) battery.innerHTML = Math.ceil(maxBattery) + " %";
  else roverAuto(0);

  // Speed update
  var randomSpeed = Math.random() * (+maxSpeed - +minSpeed) + +minSpeed;
  randomSpeed = Math.round(randomSpeed * 100) / 100;
  speed.innerHTML = randomSpeed + " km/h";

  // x-coords update
  var randomX = Math.random() * (+maxXcoords - +minXcoords) + +minXcoords;
  randomX = Math.round(randomX * 1000000) / 1000000;
  xCoords.innerHTML = randomX;

  // y-coords update
  var randomY = Math.random() * (+maxYcoords - +minYcoords) + +minYcoords;
  randomY = Math.round(randomY * 1000000) / 1000000;
  yCoords.innerHTML = randomY;

  // Attitude update
  attitude.setRoll(10 * Math.sin(increment / 2));
  attitude.setPitch(10 * Math.sin(increment / 4));

  // Altimeter update
  altimeter.setAltitude(10 * increment);
  altimeter.setPressure(1000 + 3 * Math.sin(increment / 50));
  increment++;

  setTimeout(roverData, 500);
}

// this function gets called from the buttons in the HTML page
function roverAuto(bool) {
  if (bool == 1) {
    roverData();
  } else if (bool == 0) { 
      // this stops the automatic script
      window.localStorage.setItem("rover02status", "Idle");
      document.getElementById(
        "rover02status"
      ).innerText = window.localStorage.getItem("rover02status");
    }
}