<?php
session_start();
require_once("dbconnect.inc");

$_Session['loginstatus']="";
$InputEmail1=$_POST['InputEmail1'];
$InputPassword=$_POST['InputPassword'];

$sql="select * from login where usernameID='$InputEmail1' and passwordID='$InputPassword'";
$result=mysql_query($sql) or die("Cannot verify login: ".mysql_error());

$num=mysql_num_rows($result);

if($num!=1){
     header("Location: index.html?m=Invalid login-please try again");
	 
    exit;
    }
    
$_SESSION['loginstatus']="true";
$row=mysql_fetch_array($result);
$_SESSION['accountid']=$row['accountid'];
header("Location: students.html");
exit;

?>