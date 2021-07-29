<?php

$koneksi = mysqli_connect("localhost","root","","captkost");
if (!$koneksi){
	die("Error koneksi:" . mysqli_connect_errno());
}

?>