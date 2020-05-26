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
</head>

<body>
  <?php
  $connetion = mysqli_connect("localhost", "root", "");
  mysqli_select_db($connetion, 'sasa');

  $query = mysqli_query($connetion, "SELECT * FROM rover ORDER BY id DESC LIMIT 1;");
  $row = mysqli_fetch_array($query)
  ?>
  <div class="container2">
    <h1>Real time data</h1>
    <div class="row">
      <div class="col-md-6">
        <br />
        <i style="margin-left: 4px;" class="fa fa-power-off mr-1"></i>
        <!--if speed >0 Running else Stopped or if not online Power Off-->
        <label class="contact-form__label" for="velocity">Rover status:
        </label>
        <span style="margin-left: 10px;" name="roverStatus">Stopped</span>
        <br />
        <i class="fa fa-battery-three-quarters mr-1"></i>
        <label class="contact-form__label" for="velocity">Battery level:
        </label>
        <span style="margin-left: 10px;" name="batteryData">0%</span>
        <br />
        <i style="margin-left: 7px;" class="fa fa-angle-double-right mr-1"></i>
        <label class="contact-form__label" for="velocity"> Speed: </label>
        <span style="margin-left: 10px;" name="speedData">0.00</span>
        <br />
        <i style="margin-left: 9px;" class="fa fa-map-marker-alt mr-1"></i>
        <label class="contact-form__label" for="velocity">X-coords:</label>
        <span style="margin-left: 10px;" name="xData">0.000000</span>
        <br />
        <i style="margin-left: 9px; visibility: hidden;" class="fa fa-map-marker-alt mr-1"></i>
        <label class="contact-form__label" for="velocity">Y-coords:</label>
        <span style="margin-left: 10px;" name="yData">0.000000</span>
        <br />
        <i style="margin-left: 7px;" class="fa fa-crop-alt mr-1"></i>
        <label class="contact-form__label" for="velocity">Camera tilt:</label>
        <span style="margin-left: 10px;" name="yData"><?php echo $row['cameraTilt']; ?></span>
        <label class="contact-form__label" for="velocity">°</label>
        <br />
        <i style="margin-left: 5px;" class="fa fa-rocket mr-1"></i>
        <label class="contact-form__label" for="velocity">Rover mode: </label>
        <span style="margin-left: 10px;" name="modeData"><?php echo $row['mode']; ?></span>
        <br />
        <br /><br />
        <form class="content__form contact-form" method="post" action="php/query.php">
          <button class="contact-form__button" type="button" name="startRover" id="loop" value="startRover">
            Start
          </button>
          <button class="contact-form__button" type="button" name="stopRover" id="loop" value="stopRover">
            Stop
          </button>
        </form>
      </div>
    </div>
  </div>
  <br /><br />
</body>

</html>