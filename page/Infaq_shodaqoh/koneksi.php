<?php

$host      ="localhost";
$db_user   ="root";
$db_password ="";
$db_name     ="zis";

$koneksi = mysqli_connect("localhost","root","","zis");


if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

 ?>