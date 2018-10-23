<html>
<head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <script src="https://use.typekit.net/ayg4pcz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">

  .custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }

  

 /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 600px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>


<?php $this->load->view('cart/common/nev'); ?>
        <div class="container">
             <center><h4>Show Record</h4></center>

             
            <input type="text" name="search" id="search" placeholder="Search">
            <input type="submit" name="submit" value="submit">
            <div id="res"></div>
   <table class="table table-striped custab"  border="0px solid black" id="p">
    <thead>
      <tr>
        
        <th>IMAGE</th>
        <th>ID</th>
        <th>FIRSTNAME</th>
        <th>LASTNAME</th>
        <th>GENDER</th>
        <th>HOBBIES</th>
        <th>EMAIL-ID </th>
        <th>PASSWORD</th>
        
        
        <th class="text-center" colspan="2">Action</th>
        <!--<th>EDIT</th>
        <th>DELETE</th>-->
      </tr>
      <?php if(count($result) > 0) {
 foreach ($result as $res){
 //print_r($res);  
  ?>
<tr>
    <td><img src="<?php echo base_url(); ?>uploads/<?php echo $res['image']; ?>"height="50px" width="50px"></td>
      <td><?php echo $res['id']; ?> </td>
      <td><?php echo $res['fname']; ?></td>
      <td><?php echo $res['lname']; ?></td>
      <td><?php echo $res['gender']; ?> </td>
      <td><?php echo $res['hobbies']; ?></td>
      <td><?php echo $res['email']; ?></td>
      <td><?php echo $res['password']; ?></td>


      
       <td class="text-center"><a class='btn btn-info btn-xs' href="<?php echo base_url() ?>Controller/delete/<?php echo $res['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Delete</a></td>

      <td class="text-center">  <a href="<?php echo base_url() ?>Controller/edit/<?php echo base64_encode($res['id']); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Edit</a></td>
    </tr>


<?php } ?>

<tr>
        <td colspan="3" align="center" ><?php echo $this->pagination->create_links(); ?></td>
      </tr>  
      <?php } else { ?>
      <tr>
        <td colspan="3">No data to display</td>
      </tr>
    <?php } ?>

    </thead>
  </table>
 
 


<script type="text/javascript">
  $(document).ready(function(){

    $('#search').keyup(function(){

    var search = $('#search').val();

    //alert(search);
    $.ajax({
      url:"<?php echo base_url() ?>Controller/search",
      type:"POST",
      data:{search:search},
      success:function(data){

        
        $("#p").hide();
        //alert(data);
        $('#res').html(data);
        
      }

    });



    });

  });
</script>

</body>
</html>

