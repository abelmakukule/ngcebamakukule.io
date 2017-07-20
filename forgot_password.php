 <?php
        
        include 'connection.php';
        $mess_success = "";
        $mess_error = "";
        
        if(isset($_POST['retrieve']))
        {
            if(isset($_POST['email']) && isset($_POST['id']) )
            {
                
                $email = $_POST['email'];
                $id = $_POST['id'];
                
                
                $query = 'select * from user where email = "'.$email.'"';
                
                $test = mysql_query($query) or die(mysql_error());
                
                $row = mysql_fetch_array($test);
                
                if($row['id_no'] == $id)
                {
                   $mess_success = "<h1>YOUR PASSWORD IS ".$row['password']."</h1>";
                }
                else
                {
                    $mess_error = "<h2>ENSURE THAT YOUR ID IS CORRECT</h2>";
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

                 <center><img src="images/welcome_to_IEC.png" width="197" height="21" alt="welcome_to_IEC"/></center>
                <br />
                <div id="categories_content">
                    <div id="categories_content_inside">
                        <img src="images/IEC11.png" width="200" height="180" alt="IEC11"/>
                    </div> 
                </div>
                
                
                
                
            </div>
            
            
            <div class="content">

                        <h3>PROVIDE YOUR DETAILS</h3>
                        <hr />
                        <br />
                            <form method="POST" name="retrieve_password" action="forgot_password.php">
                                <p>Enter Email : <input type="email" name="email" value="" placeholder="email@example.com" required/></p>
                                <p>Enter ID  :<input type="text" name="id" value="" placeholder="Enter ID" required/></p>

                                <input type="submit" value="Retrieve" name="retrieve" /><br />
                                <?php print $mess_success; ?> 
                            </form>
                      <?php print $mess_error; ?>  
                   
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
