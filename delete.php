<?php
include 'connect.php';

if (isset($_GET['user_id'])) {
	
	$delete_user_id=$_GET['user_id'];
	$delete_query="delete from `user_data` where user_id=$delete_user_id";
	$delete_result=mysqli_query($con,$delete_query);
	if ($delete_result) {
		echo "<script>alert('data deleted successfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}

?>