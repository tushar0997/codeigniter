<html>
<head>
	<script src="<?php echo base_url();?>jquery-3.3.1.min.js"></script>
</head>
<title></title>
<body>
	<div id="message"></div>
			<form class="form-horizontal" method="POST" id="f" enctype="multipart/form-data">

				<table align="center" border="1">
					<tr>
						<td colspan="2">
							<h2 align="center" style="margin-top: 5px;">Registration</h2>
						</td>
					</tr>
				<tr>
					<td>
				username<br>
			</td>
			<td>
				<input type="text" name="fname" id="form_fname" autocomplete="off">
				<h5 id="fnamecheck"></h5>
			</td>
			<tr>
				<td>

				<label>lname</label>
			</td>
			<td>
				<input type="text" name="lname" id="form_lname"><br>
			</td>
			<tr>
				<td>

				<label>gender</label>
			</td>
			<td>
				<input type="radio" name="gender" value="male" id="form_gender">male
				<input type="radio" name="gender" value="female" id="form_gender">female<br>
			</td>
		</tr>
		<tr>
			<td>
				<label>state</label>
			</td>
			<td>
				<select name="state" id="form_state">
     			 <option>-----select state-----</option>
     			 <?php $sql = "SELECT * from `state`";

        $ex3 = $conn->query($sql);
        while($res = mysqli_fetch_object($ex3))
        { ?>
          <option value="<?php echo $res->state_id ?>"><?php echo $res->state_name; ?></option>
        
      <?php }
       ?>
    </select><br>
</td>
    <tr>
    	<td>
    		<label>city</label>
    	</td>
    <td>
	<select name="city" id="city">

		<option>----select city-----</option>
		

	</select>
    		
			</td>
		</tr>
		

		<tr>
			<td>
				<label>email</label><br>
			</td>
			<td>
				<input type="email" name="email" id="form_email"><br>
				<h5 id="emailcheck"></h5>
			</td>
		</tr>

		<tr>
			<td>
				<label>Hobbies</label>
			</td>
			<td>

						<input type="checkbox" name="hby[]" value="football"> Football
						<input type="checkbox" name="hby[]" value="cricket"> Cricket
						<input type="checkbox" name="hby[]" value="traveling"> Traveling
						<input type="checkbox" name="hby[]" value="reading"> Reading
						<input type="checkbox" name="hby[]" value="politics"> Politics
			</td>
		</tr>

			
		<tr>
			<td>
				<label>Password</label>
			</td>
			<td>

				<input type="password" name="pass" id="form_pwd"  autocomplete="off"><br>
				<h5 id="passcheck"></h5>
			</td>
		</tr>

		<tr>
			<td>
				<label>confirm Password</label>

			</td>
			<td>

				<input type="password" name="cpass" id="form_cpwd"><br>
				<h5 id="cpasscheck"></h5>
			</td>
		</tr>

		<tr>
			<td>
				<label>upload image</label>
			</td>
			<td>

				<input type="file" name="file" id="file" ><br>
			</td>
		</tr>

		<tr>
			<td>
				<input type="submit" value="Upload" class="submit" />
			</td>
			<td>
				<input type="button"  id="show" value="show">
				
			</td>
		</tr>
		
		</table>

		<p align="center">Already Register Login  <a href="login">hear?</a></p>
		<div id="result" align="center"></div>
			</form>


		

</body>
</html>
<script type="text/javascript">
	
	$(document).ready(function(){

		$('#fnamecheck').hide();
		$('#passcheck').hide();
		$('#cpasscheck').hide();
		$('#emailcheck').hide();

		var user_err = true;
		var pass_err = true;
		var cpass_err = true;
		var email_err = true;

		$('#form_fname').keyup(function(){

			fname_check();
		});
			function fname_check(){

				var fname = $('#form_fname').val();
				if(fname.length == '')
				{
					$('#fnamecheck').show();
					$('#fnamecheck').html("**Please Fill The FirstNanme");
					$('#fnamecheck').focus();
					$('#fnamecheck').css("color","red");

					user_err = false;
					return false;					

				}
				else
				{
					$('#fnamecheck').hide();

				}

				if((fname.length < 3 || fname.length > 8  ))
				{
					$('#fnamecheck').show();
					$('#fnamecheck').html("**username length must be 3 to 10");
					$('#fnamecheck').focus();
					$('#fnamecheck').css("color","red");

					user_err = false;
					return false;					

				}
				else
				{
					$('#fnamecheck').hide();

				}

			}

			$('#form_pwd').keyup(function(){

				password_check();
			});

			function password_check()
			{

				var pwd = $('#form_pwd').val();
				if(pwd.length == '')
				{
					$('#passcheck').show();
					$('#passcheck').html("**Please Fill The password");
					$('#passcheck').focus();
					$('#passcheck').css("color","red");

					pass_err = false;
					return false;					

				}
				else
				{
					$('#passcheck').hide();

				}
				if((pwd.length < 3 || pwd.length > 15  ))
				{
					$('#passcheck').show();
					$('#passcheck').html("**password length must be 3 to 15");
					$('#passcheck').focus();
					$('#passcheck').css("color","red");

					pass_err = false;
					return false;					

				}
				else
				{
					$('#passcheck').hide();

				}
					
			}

			$('#form_cpwd').keyup(function(){

				cpass();

			});

				function cpass()
				{
					var conpass = $('#form_cpwd').val();
					var pwd = $('#form_pwd').val();

					if(pwd != conpass)
					{
						$('#cpasscheck').show();
						$('#cpasscheck').html("**password not match");
						$('#cpasscheck').focus();
						$('#cpasscheck').css("color","red");

						cpass_err = false;
						return false;					

					}
					else
					{
						$('#cpasscheck').hide();

					}
				}

				$('#form_email').keyup(function(){

					email_check();
				});
				function email_check()
				{

					var email = $('#form_email').val();
					if(email.length == '')
					{
						$('#emailcheck').show();
						$('#emailcheck').html("**Please Fill The email");
						$('#emailcheck').focus();
						$('#emailcheck').css("color","red");

						email_err = false;
						return false;					

					}
					else
					{
						$('#emailcheck').hide();

					}
				}


					

					});

				// 	$('#form_submit').click(function(){


				// 	 user_err = true;
				// 	 pass_err = true;
				// 	 cpass_err = true;
				// 	 email_err = true;

				// 	 fname_check();
				// 	 password_check();
				// 	 cpass();

				// 	 if((user_err == true) && (pass_err == true) && (cpass_err == true) && (email_err == true))
				// 	 {
				// 	 	return true;
				// 	 }
				// 	 else
				// 	 {
				// 	 	return false;
				// 	 }


					 
					 
					 
					

				// });



</script>


<script type="text/javascript">
		
		$(document).ready(function(){

			$('#form_state').change(function(){

				var state_id = $('#form_state').val();
					alert(state_id);

				$.ajax({

					type:'POST',
					url:'getcity',
					data:{state_id:state_id},
					success:function(data)
					{
						$('#city').html(data);	
					}

				});

			});

		});	


	</script>
	<script type="text/javascript">
	

	$(document).ready(function (e) {
			$("#f").on('submit',(function(e) {
			e.preventDefault();

			$.ajax({
			url: "data", 
			type: "POST",             
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,        
			success: function(data)   
			{
				alert(data);
				//$("#message").html(data);
			}
		});
	}));
		});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#show").click(function(event){
			event.preventDefault();

			$.ajax({
				type: "GET",
				url : "showdata",
				dataType: "html",
				

				success: function(result)
				{
					$("#result").html(result);
				}

			});
		});
	});
</script>
