<?php
if(isset($_POST['subtodb'])) {
    $velocity = $_POST ['velocity'];
    $coords = $_POST ['coords'];
    $mode = $_POST ['mode'];
    
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