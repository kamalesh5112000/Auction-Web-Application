<?php 
session_start();

?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
	  <div class="inputField">
      <input>
      
    </div>

	</div>
  <div class="wrapper">
    <header>Users</header>
    
    <ul class="todoList">
      <!-- data are comes from local storage -->
    </ul>
    <div class="footer">
      <span> <span class="pendingTasks"></span> </span>
      <button>Clear All</button>
    </div>
  </div>

  <script src="script.js"></script>

</body>
</html>
<script type="text/javascript">
</script>
<?php
$var = 'Metallica';
?>
<script>
   <?php
       echo "var jsvar ='$var';";
   ?>
</script>

</body>
</html>