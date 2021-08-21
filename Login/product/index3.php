<?php 
	session_start();

    include("Connection.php");
    include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  
<div class="container">
  <div class="row">
			<h1>Add To Cart In PHP</h1><hr>
			        <?php 


			        $query="SELECT * FROM product";
			        $result =mysqli_query($con, $query); 
			        $check_product=mysqli_num_rows($result)>0;
			        if($check_product)
			        {
			          while($row = mysqli_fetch_assoc($result))
			          {
			           
			echo  '
   <div class="col-sm-4 col-lg-3 col-md-3 text-center">
    
     <img src="'. $row['product_image'] .'" alt="" class="img-responsive" >
     <p><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
     <h4>Current Bid</h4>
     <h4 class="text-danger"> Rs.'. $row['product_bid'] .'</h4>
	<p><a href="view.php?id='. $row['id'] .'" class="btn btn-success">View Details</a></p>

   </div>
   ';
				}
			}
			?>
  </div>
</div>

</body>
</html>
