<?php

include 'connect.php';

if (isset($_POST['submit'])) {
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$state=$_POST['state'];
	$district=$_POST['district'];
	$number=$_POST['number'];

$select_query="select * from `user_data` where email='$email'";
$result=mysqli_query($con,$select_query);
$num=mysqli_num_rows($result);
if ($num > 0) {
	while ($rows=mysqli_fetch_assoc($result)) {
		echo "<script>alert('data already stored')</script>";
		
	}
}else
{
	$insert_query="insert into `user_data` (name,email,gender,address,state,district,number) values ('$name','$email','$gender','$address','$state','$district','$number')";

 $result_insert=mysqli_query($con,$insert_query);
 if ($result_insert) {
 	echo "<script>alert('data stored successfully')</script>";		
 }else
 {
 	echo "error";
 }
}

};




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr./database/net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<title>Form validation</title>
</head>
<style>
	.error
	{
		color:red;
	}
</style>
<body>


	<div class="container">
		<h3 class="mt-4 text-center">Form_text_validation</h3>

	<form method="post" action="" autocomplete="off" class="form">

		<div class="my-3">
			<label class="form-label">Name</label>
			<input type="text" name="name" placeholder="Enter your name" class="form-control form-control-sm" value="">
		</div>
		<div class="my-3">
			<label class="form-label">Email</label>
			<input type="email" name="email" placeholder="Enter your email" class="form-control form-control-sm">
		</div>
		<div class="my-3">
			<label class="form-label">Gender :</label>
			<input type="radio" name="gender" class=" ms-2" value="male"> Male
			<input type="radio" name="gender" class="ms-2" value="female"> Female
			<input type="radio" name="gender" class="ms-2" value="transgender"> Transgender
		</div>
		<div class="my-3">
			<label class="form-label">Address</label>
			<input type="text" name="address" placeholder="Enter your address" class="form-control form-control-sm">
		</div>

      		<div class="my-3">
			<div class="row">
				
				<div class="col-md-6">
					<label>State :</label>
					
					<select class="form-select" name="state">
						<option value="">Select Your state</option>
						<option value="tamilnadu">Tamilnadu</option>
					</select>

				</div>
				<div class="col-md-6">
					<label>District :</label>
					<select class="form-select" name="district">
						<option value="">Select Your district</option>
						<option value="vellore">Vellore</option>
					</select>
				</div>


			</div>

		</div>

		<div class="my-3">
			<label class="form-label">Mobile number</label>
			<input type="text" name="number" placeholder="Enter your address" class="form-control form-control-sm">
		</div>

		<div class="my-3 text-center">
			<button class="btn btn-primary" name="submit">Submit</button>
		</div>


	</form>

		
	</div>

	<div class="container bg-secondary bg-opacity-25">
		<h3 class="text-center">Crud Output</h3>

		<table class="table">
			<thead class="">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Address</th>
					<th>State</th>
					<th>District</th>
					<th>Mobile number</th>
					<th></th>
				</tr>
			</thead>

			<tbody>

				<?php
    
                 $select_display_query="select * from `user_data`";

                 $result_display=mysqli_query($con,$select_display_query);
                 $num_display=mysqli_num_rows($result_display);
                 if ($num_display>0) {
                 	while ($row_display=mysqli_fetch_assoc($result_display)) {
                 		$user_id=$row_display['user_id'];
                 		$name_display=$row_display['name'];
                 		$email_display=$row_display['email'];
                 		$gender_display=$row_display['gender'];
                 		$address_display=$row_display['address'];
                 		$state_display=$row_display['state'];
                 		$district_display=$row_display['district'];
                 		$number_display=$row_display['number'];
                 		echo "<td>$user_id</td>
					<td>$name_display</td>
					<td>$email_display</td>
					<td>$gender_display</td>
					<td>$address_display</td>
					<td>$state_display</td>
					<td>$district_display</td>
					<td>$number_display</td>
					<td><a href='update.php?user_id=$user_id' class='btn btn-warning btn-sm'>Edit</a> <a href='delete.php?user_id=$user_id' class='btn btn-danger btn-sm' name='delete'>Delete</a> </td>
				</tr>";

                 	}
                 }


				?>
				<tr>
<!-- 					<td>1</td>
					<td>praveen</td>
					<td>praveen@123gamil</td>
					<td>male</td>
					<td>11233 pkwekfnjkdfn</td>
					<td>tamilnadu</td>
					<td>vellore</td>
					<td>1234567890</td>
					<td><a href="javascript:void(0)" class="btn btn-warning btn-sm">Edit</a> <a href="javascript:void(0)" class="btn btn-danger btn-sm">Delete</a> </td>
				</tr> -->
			</tbody>
		</table>

	</div>

</body>
	       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>

	$(document).ready(function() {
		 $.validator.addMethod("textonly", function(value, element) {
      return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
   }, "Please enter only letters");


    $(".form").validate({
        rules: {
            name: {
                required: true,
                textonly:true, 
                maxlength: 10 
            },
            email:
            {required:true,},
            address:
            {required:true,},
            number:
            {
            	required:true,
            	digits:true,
            	minlength:10,
            	maxlength:10
            },
   
        },
         });
});
</script>
</html>

