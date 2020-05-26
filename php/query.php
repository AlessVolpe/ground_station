<?php
if (isset($_POST['subtodb'])) {
    $roverID = $_POST['roverID'];
    $speed = $_POST['speed'];
    $coordsx = $_POST['coordsx'];
    $coordsy = $_POST['coordsy'];
    $cameraTilt = $_POST['cameraTilt'];
    $mode = $_POST['mode'];

    $connetion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($connetion, 'sasa');

    $query = "INSERT into rover(roverID, speed, coordsx, coordsy, cameraTilt, mode) VALUES ('$roverID', '$speed', '$coordsx',  '$coordsy',  '$cameraTilt', '$mode')";
    $result = mysqli_query($connetion, $query);

    if ($result) {
        header("Location: ../unnamed.html#commands");
    } else {
        echo "Error";
    }
}

else if (isset($_POST['start'])) {
    $statusStart = $_POST['statusStart'];

    $connetion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($connetion, 'sasa');

    $query = "INSERT into rover(roverID, status) VALUES ('1', '$statusStart')";
    $result = mysqli_query($connetion, $query);

    if ($result) {
        header("Location: ../unnamed.html#commands");
    } else {
        echo "Error";
    }
}

else if (isset($_POST['stop'])) {
    $statusStop = $_POST['statusStop'];

    $connetion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($connetion, 'sasa');

    $query = "INSERT into rover(roverID, status) VALUES ('1', '$statusStop')";
    $result = mysqli_query($connetion, $query);

    if ($result) {
        header("Location: ../unnamed.html#commands");
    } else {
        echo "Error";
    }
}
?>