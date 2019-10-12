<?php

$con = mysqli_connect("localhost","root","");

if(!$con)
{
	echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้";
	exit;
}

$con_db = mysqli_select_db($con,"classicmodels");
if(!$con)
{
	echo "ไม่พบ database ชื่อ classicmodels";
	exit;
}

?>