//https://stackoverflow.com/questions/26509475/button-required-to-start-stop-javascript
//https://www.w3schools.com/php/php_ajax_database.asp
//https://www.youtube.com/watch?v=crtwSmleWMA

var frames = new Array(
    'http://www.google.com/', 3,
    'http://www.yahoo.com/', 3,
    'http://www.ask.com/', 3,
    'http://www.dogpile.com/', 3
);
var i = 0, 
    len = frames.length, 
    loop = false;
function ChangeSrc(){
    if(!loop) return;
    if (i >= len) { i = 0; } // start over
    document.getElementById('frame').src = frames[i++];
    setTimeout(ChangeSrc, (frames[i++]*1000));
}
function startStop(){
    loop = !loop;
    document.getElementById("loop").value = loop ? "stopRover" : "startRover";
    ChangeSrc();
}
