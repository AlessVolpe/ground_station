<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/stylesheet.css" />
<script src="https://kit.fontawesome.com/d21c2ccf9a.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/jquery.flightindicators.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

<head>
  <title>Aeneas</title>
  <!--inline CSS styling-->
  <style>
    body {
      overflow-y: hidden;
    }
  
  </style>
  <!--JavaScript function when the rover is turned on, set the corresponding dot to green, 
      remove the blinking animation, set the rover status to Idle, and restore the commands
      div in the Ground Station-->
  <script>
    function roverStart() {
      document.getElementByName('on').disabled = true;
      document.getElementByName('stop').disabled = false;
      document.getElementByName('off').disabled = false;
      window.localStorage.removeItem('dot02');
      window.localStorage.setItem('dot02', 'green');
      window.localStorage.setItem('dot02blink', 'no');
      window.localStorage.setItem('rover02status', 'Idle');
      window.localStorage.removeItem('commands02');
      document.getElementById('rover02status').innerText = window.localStorage.getItem('rover02status');
    }
  </script>
  <!--JavaScript function when the rover is stopped, set the rover status to Idle, 
      waiting for commands from the Ground Station-->
  <script>
    function roverStop() {
      document.getElementByName('on').disabled = true;
      document.getElementByName('stop').disabled = false;
      document.getElementByName('off').disabled = false;
      window.localStorage.removeItem('dot02');
      window.localStorage.setItem('dot02', 'green');
      window.localStorage.setItem('dot02blink', 'no');
      window.localStorage.setItem('rover02status', 'Idle');
      window.localStorage.removeItem('commands02');
      document.getElementById('rover02status').innerText = window.localStorage.getItem('rover02status');
      window.localStorage.setItem('roverAuto', '0');
    }
  </script>
  <!--JavaScript function when the rover is turned off, set the corresponding dot to red, 
      restore the blinking animation, set the rover status to Power Off and remove the
      commands div from the Ground Station-->
  <script>
    function roverOff() {
      document.getElementByName('on').disabled = false;
      document.getElementByName('off').disabled = true;
      document.getElementByName('stop').disabled = true;
      window.localStorage.removeItem('dot02');
      window.localStorage.setItem('dot02', 'red');
      window.localStorage.setItem('dot02blink', 'no');
      window.localStorage.setItem('rover02status', 'Offline');
      document.getElementById('rover02status').innerText = window.localStorage.getItem('rover02status');
      window.localStorage.removeItem('commands02');
      window.localStorage.setItem('commands02', 'none');
      window.localStorage.setItem('roverAuto', '0');
    }
  </script>
</head>

<body>
  <!--PHP script for connecting to DB and fetching the last row whit matching roverID-->
  <?php
  $connetion = mysqli_connect("localhost", "root", "");
  mysqli_select_db($connetion, 'sasa');

  $query = mysqli_query($connetion, "SELECT * FROM rover ORDER BY id DESC LIMIT 1;");
  $row = mysqli_fetch_array($query)
  ?>
  <!--here starts the actual page content-->
  <!--last commands received from the Ground Station-->
  <div class="container2">
    <h1>Ground Station data</h1>
    <div class="row">
      <div class="col-md-6">
        <br />
        <i style="margin-left: 4px;" class="fa fa-power-off mr-1"></i>
        <!--if speed > 0 Running, else Stopped or if not online Power Off-->
        <label class="contact-form__label" for="velocity">Rover status:
        </label>
        <span style="margin-left: 10px;" id="rover02status" name="roverStatus"></span>
        <br />
        <i class="fa fa-battery-three-quarters mr-1"></i>
        <label class="contact-form__label" for="velocity">Battery level:
        </label>
        <span style="margin-left: 10px;" name="batteryData"><?php echo $row['battery']; ?></span>
        <label class="contact-form__label" for="velocity">%</label>
        <br />
        <i style="margin-left: 7px;" class="fa fa-angle-double-right mr-1"></i>
        <label class="contact-form__label" for="velocity"> Speed: </label>
        <span style="margin-left: 10px;" name="speedData"><?php echo $row['speed']; ?></span>
        <label class="contact-form__label" for="velocity">km/h</label>
        <br />
        <i style="margin-left: 9px;" class="fa fa-map-marker-alt mr-1"></i>
        <label class="contact-form__label" for="velocity">X-coords:</label>
        <span style="margin-left: 10px;" name="xData"><?php echo $row['coordsx']; ?></span>
        <br />
        <i style="margin-left: 9px; visibility: hidden;" class="fa fa-map-marker-alt mr-1"></i>
        <label class="contact-form__label" for="velocity">Y-coords:</label>
        <span style="margin-left: 10px;" name="yData"><?php echo $row['coordsy']; ?></span>
        <br /><br /><br />
        <!--a form with buttons, to send the corresponding rover state to the db-->
        <form class="content__form contact-form" method="post" action="../php/queryaeneas.php">
          <button class="contact-form__button" type="button" onclick="roverStart();" name="on02" value="startRover">
            On
          </button>
          <button class="contact-form__button" type="button" onclick="roverStop();" name="stop02" value="stopRover">
            Stop
          </button>
          <button class="contact-form__button" type="button" onclick="roverOff();" name="off02" value="stopRover">
            Off
          </button>
        </form>
      </div>
    </div>
  </div>
  <!--local storage script of the rover status, to set correctly which buttons are enabled and which not-->
  <script>
    document.getElementById('rover02status').innerText = window.localStorage.getItem('rover02status');

    var status = window.localStorage.getItem('rover02status');
    if (status == 'Running (Manual)' || status == 'Running (Auto)') {
      document.getElementByName('on02').disabled = true;
      document.getElementByName('stop02').disabled = false;
      document.getElementByName('off02').disabled = false;
    }
    if (status == 'Idle') {
      document.getElementByName('on02').disabled = true;
      document.getElementByName('stop02').disabled = true;
      document.getElementByName('off02').disabled = false;
    }
    if (status == 'Offline') {
      document.getElementByName('on02').disabled = false;
      document.getElementByName('stop02').disabled = true;
      document.getElementByName('off02').disabled = true;
    }

    window.addEventListener("storage", function(e) {
      document.getElementById("rover02status").innerText = window.localStorage.getItem('rover02status');
    }, true);
  </script>
  <br /><br />
</body>

</html>