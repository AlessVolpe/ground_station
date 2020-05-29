var theUrl = "https://ipinfo.io/json?token=46cee73b6661ae";

function httpGet() {
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", theUrl, false); // false for synchronous request
  xmlHttp.send(null);
  var info = xmlHttp.responseText;
  var ip = document.getElementById("dataIP");
  const j = JSON.parse(info);
  ip.innerHTML = j.ip;
}
httpGet();