<?php
echo ("index <br>");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "premiunshop";

$conn = new mysqli($servername,$username,$password);
$conn->set_charset("utf8");
if($conn->connect_error){
    die("connection failed:".$conn->connect_error."<br>");
}
else
{
    echo("Success Connect<br>");
}
if(!$conn->select_db($dbname)){
    die("connection failed:".$conn->connect_error."<br>");
}
else{
    echo("Success Connect dbname <br>");
}
echo("Success");

