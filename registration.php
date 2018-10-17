
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
		<br><h3>User List</h3> <br>
		
		<?php  
			if ($this->session->flashdata('success_msg')) {
		?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('success_msg'); ?>
			</div>
		<?php	}
		?>

		<?php  
			if ($this->session->flashdata('error_msg')) {
		?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('error_msg'); ?>
			</div>
		<?php	}
		?>

		<a href="<?php echo base_url('admin_controller/add'); ?>" class="btn btn-primary" > Add new </a> 
		<br><br>
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th> Id </th>
					<th> First Name </th>
					<th> Last Name </th>
					<th> Email </th>
					<th> Gender </th>
					<th> Hobbies </th>
					<th colspan="2"> Actions </th>
				</tr>

			</thead>

			<tbody>

				<?php 
					if ($fetch_user) {
						foreach ($fetch_user as $result) {
				?>			
				<tr>
					<td> <?php echo $result->id; ?> </td>
					<td> <?php echo $result->fname; ?> </td>
					<td> <?php echo $result->lname; ?> </td>
					<td> <?php echo $result->email; ?> </td>
					<td> <?php echo $result->gender; ?> </td>
					<td> <?php echo $result->hobby; ?> </td>
					<td> <a href="<?php echo base_url(); ?>admin_controller/edit/<?php echo $result->id; ?>" class="btn btn-info">Edit</a> </td>
					<td> <a href="<?php echo base_url(); ?>admin_controller/delete/<?php echo $result->id; ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this user?');">Delete</a> </td>
				</tr>

				<?php
				 	}
				 }
				 ?>
			</tbody>

		</table>

	</div>

</body>
</html>