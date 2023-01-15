<?php

$host="localhost";
$user="root";
$password="";

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


$data=mysqli_connect($host,$user,$password);
mysqli_select_db($data, "user_info");
if($data===false)
{
	die("connection error");
}

?>