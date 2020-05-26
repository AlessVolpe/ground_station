var minSpeed = 0;
var maxSpeed = 8;
var minXcoords = 12.504315;
var maxXcoords = 12.5722932;
var minYcoords = 41.7656441;
var maxYcoords = 41.89764;
var minTilt = -60;
var maxTilt = 60;

var condition03 = false;

function start03() {
  condition03 = true;
}

function stop03() {
  condition03 = false;
}

while (condition03 == true) {
  document.getElementById("dot03").style.backgroundColor = "green";
  document.getElementById("dot03").classList.remove("blinking");
  var random = Math.random() * (+max - +min) + +min;
  document.write("Random Number Generated : " + random);

  document.getElementById("loop").value = loop ? "stopRover" : "startRover";
}

while (condition03 == false) {
  document.getElementById("dot03").style.backgroundColor = "red";
  document.getElementById("dot03").classList.remove("blinking");

  document.getElementById("loop").value = loop ? "stopRover" : "startRover";
}
