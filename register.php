<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3 align="center">Student Data</h3>

	<form method="post" enctype="multipart/form-data" 
		action="<?php echo base_url() ?>User/reg">
	<table align="center" border="1">

		<?php echo form_open('form'); ?>

			<tr>
				<td>username</td>
				<td><input type="text" name="username" value="<?php echo set_value('username'); ?>">
				<span style="color: red;"><?php echo form_error('username'); ?></span>
				</td>
			</tr>
			
			<tr>
				<td>fname</td>
				<td><input type="text" name="fname" value="<?php echo set_value('fname'); ?>">
				<span style="color: red;"><?php echo form_error('fname'); ?></span>
				</td>
			</tr>

			<tr>
				<td>lname</td>
				<td><input type="text" name="lname" value="<?php echo set_value('lname'); ?>">
				<span style="color: red;"><?php echo form_error('lname'); ?></span>
				</td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="email" value="<?php echo set_value('email'); ?>" >
				<span style="color: red;"><?php echo form_error('email'); ?></span>
				</td>
			</tr>
			<tr>
				<td>password</td>
				<td><input type="password" name="password" value="<?php echo set_value('password'); ?>">
				<span style="color: red;"><?php echo form_error('password'); ?></span>
				</td>
			</tr>

			<tr>
				<td>dob</td>
				<td><input type="date" name="dob" value="<?php echo set_value('dob'); ?>">
				<span style="color: red;"><?php echo form_error('dob'); ?></span>
				</td>
			</tr>

			<tr>
				<td>image</td>
				<td><input type="file" name="file"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="submit">
				</td>
			</tr>
	</table>
</form>

</body>
</html>