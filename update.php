<?php
include 'connect.php';

	if (isset($_GET['user_id'])) {
		
		$get_user_id=$_GET['user_id'];

		 $select_update_query="select * from `user_data`";

                 $result_update=mysqli_query($con,$select_update_query);
                 $num_update=mysqli_num_rows($result_update);
                 if ($num_update>0) {
                 	while ($row_update=mysqli_fetch_assoc($result_update)) {
                 	
                 		$name_update=$row_update['name'];
                 		$email_update=$row_update['email'];
                 		$gender_update=$row_update['gender'];
                 		$address_update=$row_update['address'];
                 		$state_update=$row_update['state'];
                 		$district_update=$row_update['district'];
                 		$number_update=$row_update['number'];


	}
}
}
  if (isset($_POST['update'])) {
	$update_name=$_POST['name'];
	$update_email=$_POST['email'];
	$update_gender=$_POST['gender'];
	$update_address=$_POST['address'];
	$update_state=$_POST['state'];
	$update_district=$_POST['district'];
	$update_number=$_POST['number'];

	$update="update `user_data` set name='$update_name',email='$update_email',gender='$update_gender',address='$update_address',state='$update_state',district='$update_district',number='$update_number' where user_id=$get_user_id ";
	$update_result=mysqli_query($con,$update);
	if ($update_result) {
		echo "<script>alert('data updated successfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else
	{
		echo "error";
	}
}

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://cdn.jsdelivr./database/net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Update </title>
	</head>
	<body>
		<div class="container">
		<h3 class="mt-4 text-center">Form_update</h3>

	<form method="post" action="" autocomplete="off" class="form">

		<div class="my-3">
			<label class="form-label">Name</label>
			<input type="text" name="name" placeholder="<?php echo $name_update; ?>" class="form-control form-control-sm" value="<?php echo $name_update; ?>">
		</div>
		<div class="my-3">
			<label class="form-label">Email</label>
			<input type="email" name="email" placeholder="" class="form-control form-control-sm" value="<?php echo $email_update;?>">
		</div>
		<div class="my-3">
			<label class="form-label">Gender :</label>
			<input type="radio" name="gender" class=" ms-2" value="male"> Male
			<input type="radio" name="gender" class="ms-2" value="female"> Female
			<input type="radio" name="gender" class="ms-2" value="transgender"> Transgender

			<small class="ms-5 text-danger"> Your selected gender is : (<?php echo $gender_update; ?>)</small>
		</div>
		<div class="my-3">
			<label class="form-label">Address</label>
			<input type="text" name="address" placeholder="<?php echo $address_update; ?>" class="form-control form-control-sm" value="<?php echo $address_update; ?>">
		</div>

      		<div class="my-3">
			<div class="row">
				
				<div class="col-md-6">
					

					<label>State :</label>
					
					<select class="form-select" name="state">
						<option value="">Select Your state</option>
						<option value="tamilnadu">Tamilnadu</option>
					</select>
					<small class=" text-danger"> Your selected State  is : (<?php echo $state_update; ?>)</small>

				</div>
				<div class="col-md-6">
					
					<label>District :</label>
					<select class="form-select" name="district">
						<option value="">Select Your district</option>
						<option value="vellore">Vellore</option>
					</select>
					<small class="text-danger"> Your selected District  is: (<?php echo $district_update; ?>)</small>
				</div>


			</div>

		</div>

		<div class="my-3">
			<label class="form-label">Mobile number</label>
			<input type="text" name="number" placeholder="" class="form-control form-control-sm" value="<?php echo $number_update; ?>">
		</div>

		<div class="my-3 text-center">
			<button class="btn btn-primary" name="update">Update</button>
		</div>


	</form>

		
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
                minlength:3,
            },
            gender:
            {required: true,},

            email:
            {required:true,},

            address:
            {required:true,},

            state:
            {required: true,},

            district:
            {required: true,},

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