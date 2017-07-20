<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>About Us</title>
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
                        <img src="images/display/6.jpg" width="200" height="180" alt="6"/>

                    </div> 
                </div>
                
                
                
                
            </div>
            
            
            <div class="content">
                
                <h3>ABOUT US</h3>
                <hr />
                
                <?php
                 if(isset($_SESSION['email']))
                 {
                   ?>
                    <div class="logout_btn">
                        <form name="logout" action="index.php" method="POST">
                            <input type="submit" value="Log out" name="logout" />
                        </form>
                    </div>
                  <?php
                 }
                ?>
            <br />
            <p>Elections in South Africa are held for the National Assembly,  <br />
                provincial legislatures and municipal councils. Elections follow a five-year cycle,  <br />
                with national and provincial elections held simultaneously and municipal elections held two years later.  <br />
                The electoral system is based on party-list proportional representation,  <br />
                which means that parties are represented in proportion to their electoral support.  <br />
                For municipal councils there is a mixed-member system in which wards elect individual councillors alongside those named from party lists.

                In elections of the National Assembly, every South African citizen who is 18 or older may vote,  <br />
                including (from the 2014 election) those resident outside South Africa. <br />
                In elections of a provincial legislature or municipal council,  <br />
                only those resident within the province or municipality may vote.  <br />
                All elections are conducted by the Electoral Commission of South Africa, 
                which is an independent body established by the Constitution</p>
           
            
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
