

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  	<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
  		
  	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">


</head>
<body>

	<div class="container">
		<br><h3> Add User </h3> <br>
		<a href="<?php echo base_url('admin_controller/index'); ?>" class="btn btn-default" > Back </a> 
		<br><br>

		<form action="<?php echo base_url('admin_controller/submit'); ?>" method="post" id="registerUser" class="form-horizontal">
			
			<div class="form-group">
				<label for="fname" class="col-md-2 text-right">First name</label>
				<div class="col-md-8">
					<input type="text" name="fname" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="lname" class="col-md-2 text-right">Last name</label>
				<div class="col-md-8">
					<input type="text" name="lname" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="col-md-2 text-right">Email</label>
				<div class="col-md-8">
					<input type="email" name="email" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="password" class="col-md-2 text-right">Password</label>
				<div class="col-md-8">
					<input type="password" name="password" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="cpassword" class="col-md-2 text-right">Confirm password</label>
				<div class="col-md-8">
					<input type="password" name="cpassword" class="form-control">
				</div>
			</div>

			<div class="form-group">
  				<label class="col-md-2 text-right " for="radios">GENDER :</label>
  				
  				<div class="col-md-8"> 
	    			<label class="radio-inline" style="margin-top: -10px;" for="male">
	      				<input type="radio" name="gender" id="male" value="male"> MALE
	    			</label> 
	    
	    			<label class="radio-inline" for="female" style="margin-top: -10px;">
	      				<input type="radio" name="gender" id="female" value="female"> FEMALE
	    			</label>
  				</div>
			</div>

			<div class="form-group">
  				<label class="col-md-2 text-right " for="radios">Hobbies :</label>
  				
  				<div class="col-md-8"> 
	    			<label class="checkbox-inline" for="football" style="margin-top: -7px;">
	      				<input type="checkbox" name="hobby[]" id="football" value="football"> Football
	    			</label> 

	    			<label class="checkbox-inline" for="cricket" style="margin-top: -7px;">
	      				<input type="checkbox" name="hobby[]" id="cricket" value="cricket"> Cricket
	    			</label> 

	    			<label class="checkbox-inline" for="chess" style="margin-top: -7px;">
	      				<input type="checkbox" name="hobby[]" id="chess" value="chess"> Chess
	    			</label> 
	    
  				</div>
			</div>

			<div class="form-group">
				<label for="date" class="col-md-2 text-right">Dob</label>
				<div class="col-md-8">
					<input type="text" id="datepicker-13" name="dob" >
				</div>
				 
			</div>

			<div class="form-group">
				<label class="col-md-2 text-right"></label>
				<div class="col-md-8">
					<input type="submit" name="btnSave" class="btn btn-primary" value="Save">
				</div>	
			</div>

		</form>

	</div>

</body>
<script type="text/javascript">
	$(document).ready(function(){
		$( "#datepicker-13" ).datepicker();
        $( "#datepicker-13" ).datepicker("show");
	});

</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registerUser').validate
	})
</script>
</html>