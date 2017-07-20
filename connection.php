<?php
    session_start();
    
    mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('iec_voting_system') or die(mysql_error());

?>
