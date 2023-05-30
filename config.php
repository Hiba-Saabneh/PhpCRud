<?php
$servername = "localhost";
$username = "root";
$password = "";
$database='mydb';

$conn= mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die('coniction failed' . mysqli_connect_error());
}
//echo 'success';
?>