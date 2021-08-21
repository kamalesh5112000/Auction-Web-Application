<?php
session_start();

    include("Connection.php");
    include("functions.php");


    $user_data=check_login($con);
    $var = $_SESSION['username'];
    $varid =$_SESSION['user_id'];

    
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Online Auction System</title>
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
<style type="text/css">
    body {
            margin: 0;
            padding: 0;
            background: black;
            color: white;
          }

          nav {
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 35px;
          }

          nav ul {
            list-style: none;
            margin: 0;
            padding: .2em 2em;
            float: right;
          }

          nav ul li {
            display: inline-block;
            margin: 0;
            padding: .2em .7em;
            color: red;
          }

          nav a {
            width: 100%;
            height: 100%;
            color: white;
            text-decoration: none;
            font-family: Ubuntu;
            font-size: 1.15em;
            font-weight: lighter;
            letter-spacing: 1px;
            transition: .25s ease-in-out;
            color: red;
          }

          nav a:hover {
            color: rgb(220, 120, 0);
          }

          .nav-bg {
            content: '';
            position: absolute;
            display: block;
            top: -100%;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: skyblue;
            transition: .45s ease-in-out;
          }

          .bg-hidden {
            top: -100%;
            opacity: 0;
          }

          .bg-visible {
            top: 0;
            opacity: 1;
          }

          h1 {
            text-align: center;
            letter-spacing: 1px;
            color: orange;
            padding: 5px;
          }

          .hero {
            position: relative;
            width: 100%;
            height: 500px;
            background: skyblue;
            background: url(bgimage.jpg) no-repeat 60% 60% fixed;
            background-size: 130%;
            overflow: hidden;
          }

          .hero h1 {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            padding: .3em;
            font-size: 4em;
            font-weight: lighter;
            padding: 5px;


          }

          .content-wrapper {
            width: 80%;
            height: 3000px;
            padding: 1em 10%;
            background: skyblue;
          }

          .content-wrapper h1 {
            margin: 0;
            color: darkgreen;
            font-size: 2.5em;

          }

          .content-wrapper p {
            font-family: "Open Sans";
            text-indent: 1.5em;
            color: black;
            font-size: 1.5em;
          }
          h2{
          	position: center;
          	top: 60%;
          	text-align: center;
          	font-size: 4em;
          	color: orange;
          	padding: 50px;
          }
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
      <a class="active" href="#home">Home</a>
      <a href="Products.php">Products</a>
      <a href="http://localhost:8080/SendMail/">Contact</a>
      <a href="mainbot.php">Chat</a>
      <a href="about.xml">About</a>
      <h3 style="text-align: right; margin-right: 10%; margin-top: 7px" class="uname" href="#"><?php echo $_SESSION['username']; ?></h3>
    </div>

  <nav>
    

  <div class="nav-bg"></div>
  <ul>
    <li><a href="logout.php">Logout</a></l5px

  </ul>
</nav>
<div class="hero">
  <h1>Hi, <?php $username = $_SESSION['username'];
   echo $_SESSION['username']; ?></h1>
  <br>
  <br><br><br><br>
  <h2 >Welcome  to Online Auction System</h2>
</div>
<div class="content-wrapper">
  <h1>About</h1>
  <p> A Website where you can buy and sell your products through online with online Payment.</p>
  
  
</div>
<script type="text/javascript">

                <?php
                       echo "var jsvar ='$var';";
                       echo "var jsvarid ='$varid';";
                  ?>
                  const obj = { username: jsvar, user_id:jsvarid};
                  console.log(jsvar);
                  sessionStorage.setItem('user',JSON.stringify(obj));
                  sessionStorage.setItem('username',jsvar);
                  sessionStorage.setItem('user_id',jsvarid);
                  console.log(sessionStorage.getItem('user'));
                  let userEnteredValue = jsvar; //getting input field value
                    let getLocalStorageData = localStorage.getItem("New Todo");
                    let getsessionStorageData=sessionStorage.getItem("New Todo"); //getting localstorage
                    if(getsessionStorageData ==null)
                    {
                      listArraysess = [];
                    }else{
                      listArraysess = JSON.parse(getsessionStorageData);
                    }
                    listArraysess.push(userEnteredValue);
                    sessionStorage.setItem("New Todo",JSON.stringify(listArraysess));
                    if(getLocalStorageData == null){ //if localstorage has no data
                      listArray = []; //create a blank array
                    }else{
                      listArray = JSON.parse(getLocalStorageData);  //transforming json string into a js object
                    }
                    listArray.push(userEnteredValue); //pushing or adding new value in array
                    localStorage.setItem("New Todo", JSON.stringify(listArray));
                
</script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'>
    
  </script>



</body>
</html>

