

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	<div class="container">
		<br><h3> Edit User </h3> <br>
		<a href="<?php echo base_url('admin_controller/update'); ?>" class="btn btn-default" > Back </a> 
		<br><br>

		<form action="<?php echo base_url('admin_controller/update'); ?>" method="post" class="form-horizontal">

			<div class="form-group">
				<label for="fname" class="col-md-2 text-right">First name</label>
				<div class="col-md-8">
					<input type="text" name="fname" value="<?php echo $fetch_user->fname; ?>" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="lname" class="col-md-2 text-right">Last name</label>
				<div class="col-md-8">
					<input type="text" name="lname" value="<?php echo $fetch_user->lname; ?>" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="col-md-2 text-right">Email</label>
				<div class="col-md-8">
					<input type="email" name="email" value="<?php echo $fetch_user->email; ?>" class="form-control">
				</div>
			</div>

			<div class="form-group">
  				<label class="col-md-2 text-right " for="radios">GENDER :</label>
  				
  				<div class="col-md-8"> 
	    			<label class="radio-inline" style="margin-top: -10px;" for="male">
	      				<input type="radio" name="gender" id="male" <?php if($fetch_user->gender == 'male'){echo "checked";} ?> value="male"> MALE
	    			</label> 
	    
	    			<label class="radio-inline" for="female" style="margin-top: -10px;">
	      				<input type="radio" name="gender" id="female"
	      				<?php if($fetch_user->gender == 'female'){echo 'checked';} ?> value="female"> FEMALE
	    			</label>
  				</div>
			</div>

			<div class="form-group">
  				<label class="col-md-2 text-right " for="radios">Hobbies :</label>

  				<?php $ary = explode(',',$fetch_user->hobby);?>
  				
  				<div class="col-md-8"> 
	    			<label class="checkbox-inline" for="football" style="margin-top: -7px;">
	      				<input type="checkbox" name="hobby[]" id="football" value="football" <?php if(in_array("football",$ary)){echo "checked";}?>> Football
	    			</label> 

	    			<label class="checkbox-inline" for="cricket" style="margin-top: -7px;">
	      				<input type="checkbox" name="hobby[]" id="cricket" value="cricket" <?php if(in_array("cricket",$ary)){echo "checked";}?>> Cricket
	    			</label> 

	    			<label class="checkbox-inline" for="chess" style="margin-top: -7px;">
	      				<input type="checkbox" name="hobby[]" id="chess" value="chess" <?php if(in_array("chess",$ary)){echo "checked";}?>> Chess
	    			</label> 
	    
  				</div>
			</div>

			<input type="hidden" name="id" value="<?php echo $fetch_user->id; ?>">

			<div class="form-group">
				<label class="col-md-2 text-right"></label>
				<div class="col-md-8">
					<input type="submit" name="btnUpdate" class="btn btn-primary" value="Update">
				</div>	
			</div>

		</form>

	</div>

</body>
</html>