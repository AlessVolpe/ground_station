<?php
if (isset($_POST['subtodb'])) {
    $speed = $_POST['speed'];
    $coordsx = $_POST['coordsx'];
    $coordsy = $_POST['coordsy'];
    $cameraTilt = $_POST['cameraTilt'];
    $mode = $_POST['mode'];

    $connetion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($connetion, 'sasa');

    $query = "INSERT into ground_station(roverID,  speed, coordsx, coordsy, cameraTilt, mode) VALUES ('1', '$speed', '$coordsx',  '$coordsy',  '$cameraTilt', '$mode')";
    $result = mysqli_query($connetion, $query);

    if ($result) {
        header("Location: ../unnamed.html");
    } else {
        echo "Error";
    }
}
