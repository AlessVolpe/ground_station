var minSpeed = 0;
var maxSpeed = 8;
var minXcoords = 12.504315;
var maxXcoords = 12.5722932;
var minYcoords = 41.7656441;
var maxYcoords = 41.89764;
var minTilt = -60;
var maxTilt = 60;

var condition02 = false;

function start02() {
  condition02 = true;
}

function stop02() {
  condition02 = false;
}

while (condition02 == true) {
  document.getElementById("dot02").style.backgroundColor = "green";
  document.getElementById("dot02").classList.remove("blinking");
  var random = Math.random() * (+max - +min) + +min;
  document.write("Random Number Generated : " + random);

  document.getElementById("loop").value = loop ? "stopRover" : "startRover";
}

while (condition02 == false) {
  document.getElementById("dot02").style.backgroundColor = "red";
  document.getElementById("dot02").classList.remove("blinking");

  document.getElementById("loop").value = loop ? "stopRover" : "startRover";
}
