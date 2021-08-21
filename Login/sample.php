<?php
session_start();

    include("Connection.php");
    include("functions.php");



    if($_SERVER['REQUEST_METHOD']=="POST")
    {
    	//something was posted
    	$username = $_POST['username'];
    	$password = $_POST['password'];
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

						header("Location: index.php"); 
    		            die;
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


?>

<!DOCTYPE html>
 <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <br>
            <br><br>
            <br>

            </header>
            <section>				
                <div id="container_demo" >
                    
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on" method="POST"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Username"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="register.php" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>