<?php
$conn=mysql_connect("localhost", "root", "") or die("Cannot connect to local host");
mysql_select_db("ecpi", $conn) or die("Cannot connect to ecpi database");
?>