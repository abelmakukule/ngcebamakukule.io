<?php
include 'connection.php';
$mess = "";
$p_vote = "";
 if(isset($_POST['nat_btn']))
 {
            if(isset($_POST['nat_drop_down']))
            {
                $p_vote = $_POST['nat_drop_down'];
                
                $query5 = 'select * from user where email ="'.$_SESSION['email'].'"';
                $result2 = mysql_query($query5) or die(mysql_error());
                
                $row2 = mysql_fetch_array($result2); 
                
                $query6 = 'update u_votes set n_vote ="'.$p_vote.'" where u_id = "'.$row2['u_id'].'"';
                
                mysql_query($query6) or die(mysql_error());
                $mess = "<h1>AND YOU HAVE VOTED</h1><h2>" .$p_vote."</h2>";
            }
       
 }
       
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>National</title>
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
                        <img src="images/display/1.jpg" width="225" height="160" alt="1"/>
                    </div> 
                </div>
                
                
                
                
            </div>
            
            
            <div class="content">
                
                 <h3>NATIONAL VOTE</h3>
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
                <?php
                   
                    $query3 = 'select * from parties';
                    $result = mysql_query($query3) or die(mysql_error());
                    
                    $u_id = $_SESSION['u_id'];
                    
                     $dn = mysql_num_rows(mysql_query('select u_id from u_votes where u_id="'.$u_id.'"'));
                     $res = mysql_query('select * from u_votes where u_id="'.$u_id.'"');
                     
                     $dn1 = mysql_fetch_array($res);
                     
                     if($dn==0 || $dn1['n_vote'] == "")
                     {
                         ?><form method="POST" name="national" action="national.php"><?php
                        while ($row = mysql_fetch_array($result)) {

                        ?>

                        <div id="categories">
                            <div id="categories_inside">
                                <img src="images/display/3.jpg" width="100" height="80" alt="3"/>

                                Name : <?php print $row['p_name']?>
                            </div>
                        </div>


                        <?php
                        print $mess;
                        }
                        ?>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <select name="nat_drop_down">
                            <option>select........</option>
                            <?php
                                $query4 = 'select * from parties';
                                $result1 = mysql_query($query4) or die(mysql_error());

                                while ($row1 = mysql_fetch_array($result1)) {

                                    print "<option value=".$row1['p_name'].">".$row1['p_name']."</option>";

                                }
                            ?>
                        </select>
                        <input type="submit" value="VOTE" name="nat_btn" />
                        </form><?php
                     }
                     else
                     {
                         print "<h1>YOU ALREADY VOTED NATIONALY </h1>";
                         print $mess;
                     }
                    
                    
                    
               ?>
               
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
