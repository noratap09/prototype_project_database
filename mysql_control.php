<?php

require 'vendor/autoload.php';
use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'classicmodels',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

if(!$database)
{
	echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้";
	exit;
}
?>