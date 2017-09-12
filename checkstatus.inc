<?php
if($_SESSION['loginstatus']!='true'){
    header("Location: login.php?m=Please enter your login info before accessing any of the pages");
    exit;
}
?>