// wait for the dom to be ready, this calls clockUpdate function every second
$(document).ready(function () {
  clockUpdate();
  setInterval(clockUpdate, 1000);
});

function clockUpdate() {
  var date = new Date(); // creates a date object

  function addZero(x) { // this is used when a value is < 10, adds the zero as in a digital clock
    if (x < 10) {
      return (x = "0" + x);
    } else {
      return x; // else returns the initial value
    }
  }
  // initializing clock variables
  var h = addZero(date.getHours());
  var m = addZero(date.getMinutes());
  var s = addZero(date.getSeconds());

  var d = new Date(); // new date object for the actual date

  var month = d.getMonth() + 1;
  var day = d.getDate();

  // this is what actualy builds and displays the clock + date
  $(".digital-clock").text(
    day + "/" + month + "/" + d.getFullYear() + " · " + h + ":" + m + ":" + s
  );
}

var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleString();