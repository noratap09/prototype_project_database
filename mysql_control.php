<?php

$con = mysqli_connect("localhost","root","");

if(!$con)
{
	echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้";
	exit;
}

mysqli_select_db($con,"classicmodels");

?>