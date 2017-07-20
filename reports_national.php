<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>National Reports</title>
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
                        <img src="images/display/9.jpg" width="225" height="170" alt="9"/>
                    </div> 
                </div>
                
                
                
                
            </div>
            
            
            <div class="content">
                
                 <h3>NATIONAL REPORT</h3>
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
            
            <table border ="1">
            <tr>
              <th>FIRSTNAME</th>
              <th>LASTNAME</th>
              <th>AGE</th>
              <th>ID NO</th>
              <th>PROVINCE</th>
              <th>NATIONAL VOTE</th>
            </tr>
            
            <?php
                $query = 'select * from u_votes';
                $result = mysql_query($query) or die(mysql_error());

                while ($row = mysql_fetch_array($result)) {
                    
                     $query1 = 'select * from user where u_id = "'.$row['u_id'].'"';
                     $result1 = mysql_query($query1) or die(mysql_error());
                     
                     while ($row1 = mysql_fetch_array($result1)) {
                          print "<tr>
                                    <td>".$row1['first_name']."</td>
                                    <td>".$row1['last_name']."</td>
                                    <td>".$row1['age']."</td>
                                    <td>".$row1['id_no']."</td>
                                    <td>".$row1['province']."</td>
                                    <td>".$row['n_vote']."</td>
                                </tr>";
                     }
                     
                   
                }
            
            
            ?>
            
            </table>
            
            <br />
            <br />
            
            <table border="1">
            <tr>
                <th>NAMES</th>
                <th>VOTES</th>
            </tr>
            <tr>
            </tr>
            <tr>
            <?php
                $count = 0;
                $que = 'select * from parties';
                $res = mysql_query($que) or die(mysql_error());
                
                while ($ro = mysql_fetch_array($res)) {
                    
                    $que1 ='select n_vote from u_votes';
                    $res1 =  mysql_query($que1) or die(mysql_error());
                    
                    while ($ro1 = mysql_fetch_array($res1)) {
                        
                        if($ro['p_name'] == $ro1['n_vote'])
                        {
                            $count = $count + 1;
                        }
                        
                    }

                    print "
                            <td>".$ro['p_id'] .":  ".$ro['p_name']."   <strong>".$count."  </strong></td>
                            ";
                    $count = 0;
                }
                
            ?>
            </tr>
            </table>
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
