<?php
    #CONEXIÓN A LA BD
    $con = mysqli_connect("localhost","root","","blog");

    if(!$con){
        die('Fallo al conectar ' . mysqli_connect_error());
    }

?>