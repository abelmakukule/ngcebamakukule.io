 
<?php
        
include 'connection.php';
$mess = "";
if(isset($_POST['signup']))
 {
      if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']) && isset($_POST['id']) && isset($_POST['province']) &&  isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_pass']) )
      {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $id = $_POST['id'];
        $province = $_POST['province'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_pass = $_POST['confirm_pass'];
                
        $query = 'insert into user(first_name,last_name,age,id_no,province,email,password,confirm_pass) values("'.$firstname.'","'.$lastname.'","'.$age.'","'.$id.'","'.$province.'","'.$email.'","'.$password.'","'.$confirm_pass.'")';
        
        if($age >= 18)
        {
            

            if($password == $confirm_pass)
            {
                if(strlen($_POST['password'])>=6)
		{
                    if(strlen($_POST['age'])==2)
                    {
                        $check_id = mysql_num_rows(mysql_query('select id_no from user where id_no="'.$id.'"'));
			if($check_id==0)
			{
                            
                            if(strlen($_POST['id'])==13)
                            {
                                $dn = mysql_num_rows(mysql_query('select email from user where email="'.$email.'"'));
                                if($dn==0)
                                {
                                    $test = mysql_query($query) or die(mysql_error());
                                    if($test)
                                    {

                                         $mess = "<h1>SUCCESSFULLY REGISTERED</h1>";
                                    }
                                    else
                                    {
                                        $mess = "<h2>ENCOUNTERED A PROBLEM WHILE INSERTING</h2>";
                                    }
                                }
                                else
                                {
                                    $mess =  "<h2>THE EMAIL YOU PROVIDED IS ALREADY IN USE, PLEASE CHOOSE ANOTHER ONE.</h2>";
                                }
                            }
                            else
                            {
                                $mess =  "<h2>ENSURE THAT YOU TYPE IN YOUR SA ID AND IT'S 13 NUMBERS LONG.</h2>";
                            }
                        }
                        else
                        {
                            $mess =  "<h2>ENSURE THAT YOU TYPE IN YOUR ID, IF THIS ID NOT YOURS.</h2>";
                        }
                    }
                    else
                    {
                        $mess = "<h2>AGE CANNOT BE MORE OR LESS THAN TWO NUMBERS</h2>";
                    }
                }
                else
                {
                    $mess = "<h2>PASSWORDS MUST BE MORE THAN SIX CHARACTERS LONG</h2>";
                }
            }
            else
            {
                $mess = "<h2>PASSWORDS DO NOT MATCH</h2>";
            }
        
        } 
        else 
        {
            $adult = 18;
            $deference = $adult - $age;
            $mess = "<h2>PLEASE WAIT ".$deference." YEARS TO BE ABLE TO VOTE</h2>";
        }     
        
                
     }
    
 }
        
        
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sign up</title>
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
                        <img src="images/IEC11.png" width="200" height="180" alt="IEC11"/>
                    </div> 
                </div>
                
                
                
                
            </div>
            
            
            <div class="content">
                
               
                    <h3>SIGN UP HERE</h3>
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
                <form method="POST" name="SIGN UP" action="signup.php">
                    <h3>PERSONAL INFORMATION</h3>
                    
                    <p>Enter First name: </td><td> <input type="text" name="firstname" value="" placeholder="Enter firstname" required/></p>
                    <p>Enter Lastname:  </td><td><input type="text" name="lastname" value="" placeholder="Enter lastname" required/></p>
                    <p>Enter Age:</td><td> <input type="text" name="age" value="" placeholder="Enter age" required/></p>
                    <p>Enter Identity Number:  </td><td><input type="text" name="id" value="" placeholder="Enter ID" required/></p>
                    <p>Select Province:  </p>
                        
                            <select name="province">
                                <option value="Gauteng">Gauteng</option>
                                <option value="Limpopo">Limpopo</option>
                                <option value="Kwazulu Natal">Kwazulu Natal</option>
                                <option value="North West">North West</option>
                                <option value="Mpumalanga">Mpumalanga</option>
                                <option value="Nothren Cape">Nothren Cape</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Western Cape">Western Cape</option>
                                <option value="Free State">Free State</option>
                            </select>
                    
                    
                    <h3>USER INFORMATION</h3>
                    
                    <p>Enter Email:  <input type="email" name="email" value="" placeholder="Enter email address" required/></p>
                    <p>Enter Password: <input type="password" name="password" value="" placeholder="Enter password" required/></p>
                    <p>Confirm Password:  <input type="password" name="confirm_pass" value="" placeholder="confirm password" required/></p>
                    
                    <input type="submit" value="Sign Up" name="signup" />
                 </form>
                    <h3>Already a user</h3></td><td><a href="index.php">Log in?</a>
                 <?php print $mess;?>
                  
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
