<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online chatting bot</title>
    <link rel="stylesheet" href="bot.css">
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
              <a class="active" href="index.php">Home</a>
              <a href="Products.php">Products</a>
              
              <a href="samsess.php">Contact</a>
              <a href="about.xml">About</a>
              <a href="logout.php">Logout</a>

            </div>
            <br>
            <br>
            <br>
    <div id="container">
        <div id="dot1"></div>
        <div id="dot2"></div>
        <div id="screen">
            <div id="header">Online Chatbot</div>
            <div id="messageDisplaySection">
            <!-- botMessages -->
            <!-- <div class="chat botMessages">Hello there, how can i help you?</div> -->

            <!-- usersMessages -->
            <!-- <div id="messagesContainer">
            <div class="chat usersMessages">I need your help to book a cake.</div>
        </div>-->
            </div>

        <!-- messages input field-->
        <div id="userInput">
            <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Type your message here.." required>
            <input type="submit" value="send" id="send" name="send">
        </div>


        </div>
    </div>
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Jquery Start -->
    <script>
        $(document).ready(function(){
            $("#messages").on("keyup",function(){

                if($("#messages").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });
        // when send button clicked
        $("#send").on("click",function(e){
            $userMessage = $("#messages").val();
            $appendUserMessage = '<div class="chat usersMessages">'+ $userMessage +'</div>';
            $("#messageDisplaySection").append($appendUserMessage);
             // ajax start
             $.ajax({
                url: "bot.php",
                type: "POST",
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // show response
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });

</script>
</body>
</html>