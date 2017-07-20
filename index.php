 <?php
        
       include 'connection.php';
        $mess_success = "";
        $mess_error = "";
        
        if(isset($_POST['login']))
        {
            if(isset($_POST['email']) && isset($_POST['password']) )
            {
                
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                
                $query = 'select * from user where email = "'.$email.'"';
                
                $test = mysql_query($query) or die(mysql_error());
                
                $row = mysql_fetch_array($test);
                
                if($row['password'] == $password)
                {
                    $_SESSION['email'] =  $_POST['email'];
                    $_SESSION['u_id'] =  $row['u_id'];
                   $mess_success = "<h1>SUCCESSFULLY LOGGED IN</h1>";
                }
                else
                {
                    $mess_error = "<h2>USERNAME OR PASSWORD IS INCORECT</h2>";
                }
                
            }
            else
            {
                $mess_error = "</h2>PLEASE ENSURE THAT ALL REQUIRED FIELDS ARE INSERTED</h2>";
            }
        }
        
        
 ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
        <script src="js/js-image-slider.js" type="text/javascript"></script>
        
        <style>
            
            .header{
                width: 1100px;
                height: 30px;
                margin: 0 auto;
                font-family: tahoma, arial, helvetica, sans-serif;
                background:  url("images/BG.png");
            }
            .footer{
                width: 1100px;
                margin: 0 auto;
                font-family: tahoma, arial, helvetica, sans-serif;
                background:  url("images/BG.png");
            }
             #categories_content {
                    float: left;
                    width: 240px;
                    padding: 10px 0;
                    padding: 0.5em;
                    margin: 0 auto;
                    background:  url("images/BG.png");

              }
            
            </style>
        
    </head>
    <body>
        <br />
        <div id="box">
            <img src="images/IEC11.png" width="100" height="80" alt="IEC11"/>
            <img src="images/slogan.png" width="500" height="75" alt="slogan"/>

            <div class="header">
                <center>
                    <a href="index.php"><img src="images/Home.png" onmouseover="this.src='images/Home1.png'" onmouseout="this.src='images/Home.png'" width="120" height="30" alt="Home"/></a>
                    <a href="About.php"><img src="images/About.png" onmouseover="this.src='images/About1.png'" onmouseout="this.src='images/About.png'" width="120" height="30" alt="About"/></a>
                    <a href="Contact.php"><img src="images/Contact.png" onmouseover="this.src='images/Contact1.png'" onmouseout="this.src='images/Contact.png'" width="120" height="30" alt="Contact"/></a>
                    <a href="Parties.php"><img src="images/Parties.png" onmouseover="this.src='images/Parties1.png'" onmouseout="this.src='images/Parties.png'" width="120" height="30" alt="Help"/></a>
                <center>
            </div>
            
            <div class="side">
                
                
                 <?php 
                    if(isset($_SESSION['email']))
                    {
                        ?>
                            <img src="images/QUICK_LINKS.png" width="150" height="30" alt="QUICK_LINKS"/>
                            <br />
                            <br />
                            <a href="profile.php">PROFILE</a><br />
                            <a href="provinsional.php">PROVINSINAL VOTE</a><br />
                            <a href="national.php">NATIONAL VOTE</a><br />
                            
                            <?php
                                $query7 = 'select * from user where email = "'.$_SESSION['email'].'"';
                                $result7 = mysql_query($query7) or die(mysql_error());
                                
                                $row7 = mysql_fetch_array($result7);
                                
                                if($row7['role'] == "admin")
                                {
                                    ?>
                                        <a href="reports_provinsial.php">PROVINSIONAL REPORT</a><br />
                                        <a href="reports_national.php">NATIONAL REPORT</a><br />
                                    <?php
                                }
                            ?>
                            
                            
                        <?php
                    }
                    else
                    {
                        ?>
                            <center><img src="images/welcome_to_IEC.png" width="197" height="21" alt="welcome_to_IEC"/></center>
                        <?php
                        
                    }
                 ?>
                <br />
                <div id="categories_content">
                    <div id="categories_content_inside">
                        <img src="images/display/8.jpg" width="230" height="125" alt="8"/>

                    </div> 
                </div>
                
                
                
                
            </div>
            
            
            <div class="content">
                
                    
                    
                    <?php
                    if(isset($_SESSION['email']))
                    {
                      ?>
                       <div class="logout_btn">
                           <form name="logout" action="index.php" method="POST">
                               <input type="submit" value="Log out" name="logout" />
                           </form>
                       </div>
                    <center><img src="images/display/10.jpg" width="580" height="385" alt="10"/></center>

                     <?php
                     print $mess_success;
                    }
                    else
                    {
                        ?>
                        <h3>LOG IN HERE</h3>
                        <hr />
                        <br />
                            <form method="POST" name="login" action="index.php">
                                <p>Enter Email : <input type="email" name="email" value="" placeholder="email@example.com" required/></p>
                                <p>Enter Password :<input type="password" name="password" value="" placeholder="password" required/></p>

                                <input type="submit" value="Log In" name="login" /><br />
                                <br />
                                <a href="signup.php"><img src="images/signup.png" width="65" height="25" alt="signup"/></a><a href="forgot_password.php"><u>forgot password ?</u></a>
                            </form>

                        <?php
                        print $mess_error;
                    }
                   ?>
                
            
            </div>
            
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <div class="footer">
                <center><h6>Copyright@IEC(Independent Election Commision) 2014 . All rights reserved</h6></center>
            </div>
            
        </div>
        <br />
       <?php
       if(isset($_POST['logout']))
       {
           unset($_SESSION['email']);
           session_destroy();
       }
       ?>
    </body>
</html>
