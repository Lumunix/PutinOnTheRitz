<?php
header('Access-Control-Allow-Origin: *');

$host="localhost"; // Host name 
$username="ydrgn_Fellowship"; // Mysql username 
$password="GDCFellowship"; // Mysql password 
$db_name="ydrgn_FellowshipGDC"; // Database name 
$tbl_name="GDC"; // Table name
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

     //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $name = strip_tags(mysql_real_escape_string($_POST['name']));
     $location = strip_tags(mysql_real_escape_string($_POST['location']));
     $date = strip_tags(mysql_real_escape_string($_POST['date']));
	 $start = strip_tags(mysql_real_escape_string($_POST['start']));
     $end = strip_tags(mysql_real_escape_string($_POST['end']));
     $details = strip_tags(mysql_real_escape_string($_POST['details']));
	 $upvote = strip_tags(mysql_real_escape_string($_POST['upvote']));
     $downvote = strip_tags(mysql_real_escape_string($_POST['downvote']));
	 $url = strip_tags(mysql_real_escape_string($_POST['url']));
	   
     $sql = mysql_query("INSERT INTO $db.$tbl_name (ID,Name,Location,Date,Start,End,Details,Upvote,Downvote,Url) VALUES ('','$name','$location','$date','$start','$end','$details','$upvote','$downvote','$url');"); 
     if($sql){
          echo 'Party saved!';        
     }else{
          echo 'Party failed to save.';      
     }
     

mysql_close();//Close off the MySQL connection to save resources.
?>