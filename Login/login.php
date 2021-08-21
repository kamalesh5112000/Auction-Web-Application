<?php

session_start();

    include("Connection.php");
    include("functions.php");



    if($_SERVER['REQUEST_METHOD']=="POST")
    {
    	//something was posted
    	$username = $_POST['username'];
        
    	$password = $_POST['password'];
        $user_type="admin";
    	$pass=md5($password);

    	if(!empty($username) && !empty($password) &&!is_numeric($username))
    	{
    		//read from db
    		
    		$query="select * from users where user_name = '$username'  limit 1";

    		$result = mysqli_query($con, $query);

    		if($result)
    		{
    			if($result && mysqli_num_rows($result)>0)
				{
					$user_data=mysqli_fetch_assoc($result);
					if($user_data['password']===$password)
					{
						$_SESSION['user_id'] = $user_data['user_id'];
                        $userid=$user_data['user_id'];
						
                        if($user_data['user_type']==$user_type)
                        {
                            if(!empty($_POST["remember"]))
                            {
                                ///end cookie
                                $remember_checkbox=$_POST['remember']; 

                                ///cookie
                                setcookie('username',$username,time()+30);
                                setcookie('password',$password,time()+30);
                                setcookie('userlogin',$remember_checkbox,time()+30);

                            }else
                            {
                                setcookie('username',$username,30);
                                setcookie('password',$password,30);

                            }
                            
                            $_SESSION['username']=$username;
                            $query2="insert into userlog (user_id,user_name) values ('$userid','$username')";
                            mysqli_query($con, $query2);  

                            header("Location: addproduct.php"); 
                            die;

                        }else
                        {
                            if(!empty($_POST["remember"]))
                            {
                                ///end cookie
                                $remember_checkbox=$_POST['remember']; 

                                ///cookie
                                setcookie('username',$username,time()+30);
                                setcookie('password',$password,time()+30);
                                setcookie('userlogin',$remember_checkbox,time()+30);

                            }else
                            {
                                setcookie('username',$username,30);
                                setcookie('password',$password,30);

                            }
                            
                            $_SESSION['username']=$username;
                            $query2="insert into userlog (user_id,user_name) values ('$userid','$username')";
                            mysqli_query($con, $query2); 

                            header("Location: index.php"); 
                            die;
                        }
						
					}
				}
    		}else{
    			echo" Wrong username or password!";
    		}

    		


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
</head>
<body>

    <div style="margin-top: -120px; background-color: #59abf2;" class="main">
        <h2 style="text-align: center; font-size: 80px;">Welcome to Online Auction System</h2>
            <section class="signin">
                    <div class="container">
                        <div class="signin-content">
                            <div class="signin-image">
                                <figure><img src="images/signup.jpg" alt="sing up image"></figure>
                                
                            </div>

                            <div class="signin-form">
                                <h2 class="form-title">Sign up</h2>
                                <form method="POST" class="register-form" id="login-form">
                                    <div class="form-group">

                                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <div class="inputField">
                                             <input class="username" type="text" name="username" id="your_name" placeholder="Your Name" value="<?php if(isset($_COOKIE['username'])){ echo$_COOKIE['username'];};?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="password" id="your_pass" placeholder="Password" value="<?php if(isset($_COOKIE['password'])){ echo$_COOKIE['password'];};?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="remember" id="remember-me" class="agree-term" <?php if(isset($_COOKIE['userlogin'])) { ?> checked <?php } ?>/>
                                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                                    </div>
                                    <div class="form-group form-button">
                                        <div class="inputField">
                                             <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                                        </div>
                                        <br>
                                        <a href="signup.php">Create an account</a>
                                    </div>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            

    <script src="vendor/jquery/jquery.min.js"></script>


</body>
</html>