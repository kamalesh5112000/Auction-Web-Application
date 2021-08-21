<?php 


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Session Users</title>
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
		.wrapper{
		  background: #fff;
		  max-width: 400px;
		  width: 100%;
		  margin: 120px auto;
		  padding: 25px;
		  border-radius: 5px;
		  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
		}
		.wrapper header{
		  font-size: 30px;
		  font-weight: 600;
		}
		.wrapper .todoList{
		  max-height: 250px;
		  overflow-y: auto;
		}

	</style>
	<div class="topnav">
	  <a class="active" href="#home">Add Products</a>
	  <a href="session.php">View Users</a>
	  <a href="logout.php">Logout</a>
	  <a href="samsess.php">session</a>

	</div>
	<br><br>
	<ul class="todoList">
      <h1>Sample Data</h1>
    </ul>
    <script type="text/javascript">
    	const todoList = document.querySelector(".todoList");
    	showTasks();
    	function showTasks(){
		  let getsessionStorageData=sessionStorage.getItem("New Todo"); //getting localstorage
		  if(getsessionStorageData ==null)
		  {
		    listArraysess = [];
		  }else{
		    listArraysess = JSON.parse(getsessionStorageData);
		  }
		  const pendingTasksNumb = document.querySelector(".pendingTasks");
		  pendingTasksNumb.textContent = listArraysess.length;
		  let newLiTagses = "";
		  listArraysess.forEach((element, index) => {
		    newLiTagses += `<li>${element}<span class="icon" onclick="deleteTask(${index})"><i class="fas fa-trash"></i></span></li>`;
		  });
		  todoList.innerHTML = newLiTagses;

		}
    </script>

</body>
</html>