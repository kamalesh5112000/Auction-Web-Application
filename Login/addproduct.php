<?php

session_start();

    include("Connection.php");
    include("functions.php");

    if(isset($_POST["submit"]))
    {
    	$v1=rand(1111,9999);
    	$v2=rand(1111,9999);
    	$v3=$v1.$v2;
    	$v3=md5($v3);
    	$fnm=$_FILES['pimage']["name"];
    	$dst="./Product_image/".$v3.$fnm;
    	$dst1="Product_image/".$v3.$fnm;
    	$pname=$_POST['pnm'];
    	$pprice=$_POST['pprice'];
    	$cbid=$_POST['pbid'];
    	$bname=$_POST['bname'];
    	move_uploaded_file($_FILES['pimage']["tmp_name"], $dst);


    	$query3="insert into product(product_name,product_price,product_bid,product_image,bidder_name) values ('$pname','$pprice','$cbid','$dst1','$bname')";
    	mysqli_query($con, $query3); 
    	
    }
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Product</title>

</head>
<body>
	<style type="text/css">
		.topnav {
		  background-color: #333;
		  overflow: hidden;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
		  float: left;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
		  background-color: #ddd;
		  color: black;
		}

		/* Add a color to the active/current link */
		.topnav a.active {
		  background-color: #04AA6D;
		  color: white;
		}
	</style>

<div class="topnav">
  <a class="active" href="#home">Add Products</a>
  <a href="session.php">View Users</a>
  <a href="logout.php">Logout</a>
	<a href="samsess.php">session</a>

</div>
<br>
<br>
<h1 style="text-align: center; ">Welcome to Admin Panel</h1>
<br>
<div class="grid_10">
	
	<div class="box_round_first">
		<h2>Add Product</h2>

		<div style=" align-items: center; align-content: center;" class="block">
			<form name="form1" action="" method="POST" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Product Name</td>
						<td><input type="text" name="pnm"></td>

					</tr>
					
					<tr>
						<td>Product Starting Price:</td>
						<td><input type="text" name="pprice"></td>
					</tr>
					
					<tr>
						<td>Current Biddin:</td>
						<td><input type="text" name="pbid"></td>
					</tr>
					
					<tr>
						<td>Product Image:</td>
						<td><input type="file" name="pimage"></td>
					</tr>
					
					<tr>
						<td>Bidder Name:</td>
						<td><input type="text" name="bname"></td>
					</tr>

					<tr>
						<td colspan="2" align="center"><input type="submit" value="Add PRoduct" name="submit"></td>
					</tr>

				</table>
			</form>
		</div>
	</div>
</div>


</body>
</html>