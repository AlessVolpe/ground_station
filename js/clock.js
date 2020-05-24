$(document).ready(function () {
  clockUpdate();
  setInterval(clockUpdate, 1000);
});

function clockUpdate() {
  var date = new Date();

  function addZero(x) {
    if (x < 10) {
      return (x = "0" + x);
    } else {
      return x;
    }
  }

  var h = addZero(date.getHours());
  var m = addZero(date.getMinutes());
  var s = addZero(date.getSeconds());

  var d = new Date();

  var month = d.getMonth() + 1;
  var day = d.getDate();

  $(".digital-clock").text(
    day + "/" + month + "/" + d.getFullYear() + " · " + h + ":" + m + ":" + s
  );
}

var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleString();
