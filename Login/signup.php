<?php
session_start();

    include("Connection.php");
    include("functions.php");



    if($_SERVER['REQUEST_METHOD']=="POST")
    {
    	//something was posted
    	$user_name = $_POST['username'];
    	$password = $_POST['password'];

    	if(!empty($user_name) && !empty($password) &&!is_numeric($user_name))
    	{
    		//save to db
    		$user_id=random_num(20);
            $user_type="user";
    		$query="insert into users (user_id,user_name,password,user_type) values ('$user_id','$user_name','$password','$user_type')";

    		mysqli_query($con, $query);

    		header("Location: login.php");
    		die;


    	}else
    	{
    		echo "Please enter Valid information!";
    	}

    }

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">   
    <script>
function Formvalidate() {
  var object ={
    firstname : document.forms["signupform"]["fname"].value,
    lastname:document.forms["signupform"]["lname"].value,
    phone:document.forms["signupform"]["phone"].value,
    usern:document.forms["signupform"]["username"].value,
    passw:document.forms["signupform"]["password"].value,
    cpassw:document.forms["signupform"]["confirm_password"].value,
  }

  if(object.passw!=object.cpassw){
      alert("Password and Confirm password are not Same");
      return false;
  }
  var usernamearray=["sampleuser"]
  var i=usernamearray.length;
  i++
  usernamearray[i]=object.usern

  var passwordarray=["password"]
  var j=passwordarray.length;
  j++
  passwordarray[i]=object.passw
  alert(object.cpassw,object.passw)

  if (object.x == "") {
    alert("Name must be filled out");
    return false;
  }
}
    </script>

    
</head>
<body>
        <div style="margin-top: -120px; background-color: #59abf2;" class="main">
        <h2 style="text-align: center; font-size: 80px;">Welcome to Online Auction System</h2>
                <section class="signup">
                    <div class="container">
                        <div class="signup-content">
                            <div class="signup-form">
                                <h2 class="form-title">Sign up</h2>
                                <form method="POST" class="register-form" id="register-form" validate="Formvalidate">
                                    <div class="form-group">
                                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="username" id="name" placeholder="Username"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="password" id="pass" placeholder="Password"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                                    </div>
                                    <div class="form-group form-button">
                                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                        <br>

                                        <a href="login.php">I am already member</a>
                                    </div>
                                </form>
                            </div>
                            <div class="signup-image">
                                <figure><img src="images/signup2.jpg" alt="sing up image"></figure>
                                
                            </div>
                        </div>
                    </div>
                </section>

            </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>