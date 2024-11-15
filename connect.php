<?php

$hostname='localhost';
$username='root';
$password='';
$database='form_text_validation';

$con=mysqli_connect($hostname,$username,$password,$database);
if (!$con) {
	 die(mysqli_error($con));
}
?>