<?php
$server = "localhost";
$user ="root";
$password = "";
$database="rpl";
$koneksi=mysqli_connect($server, $user, $password, $database);
if(!$koneksi){
    echo "Eror :" . mysqli_connect_error();
}else{
    // echo"Koneksi Tersambung";
}
?>