<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/nav-menu.css" />
<link rel="stylesheet" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/flightindicators.css" />
<script src="https://kit.fontawesome.com/d21c2ccf9a.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/jquery.flightindicators.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

<head>
  <title>Unnamed Ground Vehicle</title>
  <style>
    #map {
      height: 400px;
      width: 540px;
      margin: 0;
      margin-top: -40px;
      border-radius: 2%;
      border: 2px solid #812535;
    }

    #description {
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
    }
  </style>
  <script>
    function roverStart() {
      document.getElementById('on').disabled=true;
      document.getElementById('stop').disabled=false;
      document.getElementById('off').disabled=false;
      window.localStorage.removeItem('dot01');
      window.localStorage.setItem('dot01', 'green');
      window.localStorage.setItem('rover01status', 'Idle');
      window.localStorage.removeItem('commands01');
      document.getElementById('rover01status').innerText = window.localStorage.getItem('rover01status');
      roverAuto(1);
    }
  </script>
  <script>
    function roverStop() {
      document.getElementById('on').disabled=true;
      document.getElementById('stop').disabled=false;
      document.getElementById('off').disabled=false;
      window.localStorage.removeItem('dot01');
      window.localStorage.setItem('dot01', 'green');
      window.localStorage.setItem('rover01status', 'Idle');
      window.localStorage.removeItem('commands01');
      document.getElementById('rover01status').innerText = window.localStorage.getItem('rover01status');
      roverAuto(0);
    }
  </script>
  <script>
    function roverOff() {
      document.getElementById('on').disabled=false;
      document.getElementById('off').disabled=true;
      document.getElementById('stop').disabled=true;
      window.localStorage.removeItem('dot01');
      window.localStorage.setItem('dot01', 'red');
      window.localStorage.setItem('rover01status', 'Offline');
      document.getElementById('rover01status').innerText = window.localStorage.getItem('rover01status');
      window.localStorage.removeItem('commands01');
      window.localStorage.setItem('commands01', 'none');
      roverAuto(0);
    }
  </script>
</head>

<body>
  <?php
  $connetion = mysqli_connect("localhost", "root", "");
  mysqli_select_db($connetion, 'sasa');

  $query = mysqli_query($connetion, "SELECT * FROM rover ORDER BY id DESC LIMIT 1;");
  $row = mysqli_fetch_array($query)
  ?>
  <div class="container2">
    <h1>Ground Station data</h1>
    <div class="row">
      <div class="col-md-6">
        <br />
        <i style="margin-left: 4px;" class="fa fa-power-off mr-1"></i>
        <!--if speed >0 Running else Stopped or if not online Power Off-->
        <label class="contact-form__label" for="velocity">Rover status:
        </label>
        <span style="margin-left: 10px;" id="rover01status" name="roverStatus">Stopped</span>
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
        <br />
        <i style="margin-left: 7px;" class="fa fa-crop-alt mr-1"></i>
        <label class="contact-form__label" for="velocity">Camera tilt:</label>
        <span style="margin-left: 10px;" name="yData"><?php echo $row['cameraTilt']; ?>°</span>
        <br />
        <i style="margin-left: 5px;" class="fa fa-rocket mr-1"></i>
        <label class="contact-form__label" for="velocity">Rover mode: </label>
        <span style="margin-left: 10px;" name="modeData"><?php echo $row['mode']; ?></span>
        <br />
        <br /><br />
        <form class="content__form contact-form" method="post" action="php/query.php">
          <button class="contact-form__button" type="button" onclick="roverStart()" name="startRover" id="on" value="startRover">
            On
          </button>
          <button class="contact-form__button" type="button" onclick="roverStop()" name="stopRover" id="stop" value="stopRover">
            Stop
          </button>
          <button class="contact-form__button" type="button" onclick="roverOff(); document.getElementById('stop').disabled=true; document.getElementById('off').disabled=true; document.getElementById('on').disabled=false;" name="stopRover" id="off" value="stopRover">
            Off
          </button>
        </form>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("rover01status").innerText = window.localStorage.getItem('rover01status');
  </script>
  <!--<script>
    var onButton=document.getElementById("on");
    onButton.addEventListener('click', function(evt) {window.localStorage.setItem('dot01', 'green');});
    </script>-->
    <br /><br />
    <script src="js/roverData.js"></script>
</body>

</html>