<?php
if(isset($_POST['submit'])) {
    $velocity = $_GET ['velocity'];
    $coords = $_GET ['coords'];
    $mode = $_GET ['mode'];
    
    $connetion = mysqli_connect("localhost","root","");
    mysqli_select_db($connetion, 'ground_station');

    $query = "INSERT into unnamed(velocity, coords, mode) VALUES ('$velocity', '$coords', '$mode')";
    $result = mysqli_query($connetion, $query);
    
    if($result) {
        echo "Dati inseriti";
    }
    else {
        echo "Invalid";
    }
}
?>