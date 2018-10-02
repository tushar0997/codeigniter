<!DOCTYPE html>
<html>
<head>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title></title>
</head>
<body>

	<h3>Student Data</h3>
	<table>

		<form method="post" id="register" action="<?php echo base_url() ?>User/storedata">
			
			<tr>
				<td>
					First Name
				</td>
				<td>
					<input type="text" name="fname" id="form_fname">
					<span id="fname_error"></span>
				</td>
			</tr>

			

			<tr>
				<td>
					Email
				</td>
				<td>
					<input type="text" name="email" id="form_email">
					<span id="email_error"></span>
				</td>
			</tr>

			<tr>
				<td>
					Password
				</td>
				<td>
					<input type="password" name="password" id="form_pass">
					<span id="pass_error"></span>
				</td>
			</tr>

			<tr>
				<td>
					Confirm Password
				</td>
				<td>
					<input type="password" name="cpass" id="form_cpass">
					<span id="cpass_error"></span>
				</td>
			</tr>
			
			<tr>
				<td>
					
				</td>
				<td>
					<input type="submit" name="register" value="submit">
					
				</td>
			</tr>



		</form>
		
	</table>

</body>
</html>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#fname_error').hide();
		$('#email_error').hide();
		$('#pass_error').hide();
		$('#cpass_error').hide();

		var fname_val = false;
		var email_val = false;
		var pass_val = false;
		var cpass_val = false;

		$('#form_fname').focusout(function(){

			checkfname();

		});

		$('#form_email').focusout(function(){

			checkemail();
		});

		$('#form_pass').focusout(function(){

			checkpass();
		});
		$('#form_cpass').focusout(function(){

			checkcpass();
		});

		function checkfname(){

			var fname_length = $('#form_fname').val().length;

			if(fname_length < 5 || fname_length >11)
			{
				$('#fname_error').show();
				$('#fname_error').html('username length between 5to11 char');
				$('#fname_error').css("color","red");
				fname_val = true;
			}
			else
			{
				$('#fname_error').hide();
			}

		}
		function checkemail() {
				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
						
				if (pattern.test($('#form_email').val())) {
					$('#email_error').hide();
				}
				else {
					$('#email_error').html("Invalid Email address..");
					$('#email_error').css('color','red');
					$('#email_error').show();
					email_val = true;
				}
			}

		function checkpass()
		{
			var pass = $('#form_email').val();
			

			if(pass == '')
			{
				$('#pass_error').html("password Field Must Be Fill Out..");
				$('#pass_error').css('color','red');
				$('#pass_error').show();
				pass_val = true;
			}
			else
			{
				$('#pass_error').hide();
			}
		}
			function checkcpass()
			{
				 var pass = $('#form_email').val();
				 var cpass = $('#form_cpass').val();

				if(pass != cpass)
				{
					$('#cpass_error').html("password Not Match");
					$('#cpass_error').css('color','red');
					$('#cpass_error').show();
					pass_val = true;
				}
				else
				{
					$('#cpass_error').hide();
				}
			}
		

		$('#register').submit(function(){

			fname_val = false;
			email_val = false;
			pass_val = false;
			cpass_val = false;

			checkfname();
			checkemail();
			checkpass();
			checkcpass();

			if(fname_val == false && email_val == false && pass_val == false && cpass_val == false)
			{
				return true;
			}
			else
			{
				return false;
			}



		});

	
	});

</script>