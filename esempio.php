<?php
if(isset($_POST['subtodb'])) {
    $velocity = $_POST ['velocity'];
    $coordsx = $_POST ['coordsx'];
    $coordsy = $_POST ['coordsy'];
    $mode = $_POST ['mode'];
    $coords = $coordsy . " " . $coordsx;

    $connetion = mysqli_connect("localhost","root","");
    mysqli_select_db($connetion, 'ground_station');

    $query = "INSERT into unnamed(velocity, coords, mode) VALUES ('$velocity', '$coords', '$mode')";
    $result = mysqli_query($connetion, $query);
    
    if($result) {
        echo "Dati inseriti $velocity, $coords, $mode";
    }
    else {
        echo "Invalid";
    }
}
?>