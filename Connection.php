<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="restraunt_db";

if(!$con=mysqli_connect($dbhost ,$dbuser,$dbpass,$dbname)){

    die("cant connect..");
}