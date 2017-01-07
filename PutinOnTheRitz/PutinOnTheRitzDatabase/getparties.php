<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/xml');



$host="localhost"; // Host name 
$username="ydrgn_Fellowship"; // Mysql username 
$password="GDCFellowship"; // Mysql password 
$db_name="ydrgn_FellowshipGDC"; // Database name 
$tbl_name="GDC"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Retrieve data from database 
$sql="SELECT * FROM $tbl_name ORDER BY Name";
$result=mysql_query($sql);

echo "<Response>";
while($rows=mysql_fetch_array($result)){
	 $id=  htmlspecialchars($rows['ID'], ENT_QUOTES, 'UTF-8');
	 $name = htmlspecialchars($rows['Name'], ENT_QUOTES, 'UTF-8');
     $location = htmlspecialchars($rows['Location'], ENT_QUOTES, 'UTF-8');
     $date = htmlspecialchars($rows['Date'], ENT_QUOTES, 'UTF-8');
	 $start = htmlspecialchars($rows['Start'], ENT_QUOTES, 'UTF-8');
     $end = htmlspecialchars($rows['End'], ENT_QUOTES, 'UTF-8');
     $details = htmlspecialchars($rows['Details'], ENT_QUOTES, 'UTF-8');
	 $upvote = htmlspecialchars($rows['Upvote'], ENT_QUOTES, 'UTF-8');
     $downvote = htmlspecialchars($rows['Downvote'], ENT_QUOTES, 'UTF-8');
	 $url = htmlspecialchars($rows['Url'], ENT_QUOTES, 'UTF-8');
	
	echo "<Party id='".$id."' name='". $name."' location='". $location."' date='". $date."' start='". $start."' end='". $end."' details='". $details."' upvote='". $upvote."' downvote='". $rows['Downvote']."' url='". $rows['Url']."'/>";

}
echo "</Response>";

mysql_close();
?>