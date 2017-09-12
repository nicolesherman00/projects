<?php
if (empty($_POST['user_name']) && empty($_POST['schedule_appt_mon']) && empty($_POST['schedule_appt_tues'])
		&& empty($_POST['schedule_appt_wed']) && empty($_POST['schedule_appt_thurs'])
		&& empty($_POST['schedule_appt_fri']))
	echo "<p>You must select an appointment time. Click your browser's Back 
			button to reurn to the appointment scheduler.";
else{
	$DBConnect = new mysqli("localhost", "root");
	if ($DBConnect ===FALSE)
		echo "<p>Unable to connect to the 
				database server.</p>"
				."<p>Error code ". mysqli_errno($DBConnect)
				.": ". mysqli_error($DBConnect) . "</p>";
	else{
		$DBName = "schedule";
		if (!@mysqli_select_db($DBConnect, $DBName)) {
			$SQLstring = "CREATE DATABASE $DBName";
			$QueryResult = @mysqli_query($DBConnect, $SQLstring);
			if ($QueryResult === FALSE)
				echo "<p>Unable to execute the
						query.</p>"
						."<p> Error code ". mysqli_errno(
								$DBConnect)
								.": ". mysqli_error($DBConnect)
								. "</p>";
			else 
				echo "<p> Your appointment request has been submitted</p>";
		}
		mysqli_select_db($DBConnect, $DBName);
		$TableName = "Appointments";
		$SQLstring = "SHOW TABLES LIKE '$TableName'";
		$resultmode = MYSQLI_STORE_RESULT;
		$QueryResult = mysqli_query($DBConnect, $SQLstring , $resultmode);
		if (mysqli_num_rows($QueryResult) == 0) {
			$SQLstring = "CREATE TABLE $TableName
			(countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, user_name VARCHAR(15),
			 schedule_appt_mon VARCHAR(100), schedule_appt_tues VARCHAR(100),
			 schedule_appt_wed VARCHAR(100), schedule_appt_thurs VARCHAR(100),
			 schedule_appt_fri VARCHAR(100))";
			$resultmode = MYSQLI_STORE_RESULT;
			$QueryResult = mysqli_query($DBConnect, $SQLstring , $resultmode);
			if ($QueryResult === FALSE)
				echo "<p>Unable to create the table.</p>"
						."<p>Error code ". mysqli_errno(
						$DBConnect)
						. ": ". mysqli_error($DBConnect).
						"</p>";
			$UserName = stripslashes($_POST['user_name']);
			$Monday = stripslashes($_POST['schedule_appt_mon']);
			$Tuesday = stripslashes($_POST['schedule_appt_tues']);
			$Wednesday = stripslashes($_POST['schedule_appt_wed']);
			$Thursday = stripslashes($_POST['schedule_appt_thurs']);
			$Friday = stripslashes($_POST['schedule_appt_fri']);
			$SQLstring = "INSERT INTO $TableName Values(NULL, '$UserName','$Monday', '$Tuesday',
			 '$Wednesday', '$Thursday', '$Friday')";
			$resultmode = MYSQLI_STORE_RESULT;
			$QueryResult = mysqli_query($DBConnect, $SQLstring , $resultmode);
			if ($QueryResult === FALSE)
				echo "<p>Unable to execute the query.</p>"
						."<p>Error code ". mysqli_errno($DBConnect)
						. ": " . mysqli_error($DBConnect) .
						"</p>";
			else {
				echo "<h1>Thank You For Your Appointment Request!</h1>";
			}
		}
		mysqli_select_db($DBConnect, $DBName);
		$TableName = "Appointments";
		$SQLstring = "SHOW TABLES LIKE '$TableName'";
		$resultmode = MYSQLI_STORE_RESULT;
		$QueryResult = mysqli_query($DBConnect, $SQLstring , $resultmode);
		if (mysqli_num_rows($QueryResult) != 0) {
			$UserName = stripslashes($_POST['user_name']);
			$Monday = stripslashes($_POST['schedule_appt_mon']);
			$Tuesday = stripslashes($_POST['schedule_appt_tues']);
			$Wednesday = stripslashes($_POST['schedule_appt_wed']);
			$Thursday = stripslashes($_POST['schedule_appt_thurs']);
			$Friday = stripslashes($_POST['schedule_appt_fri']);
			$SQLstring = "INSERT INTO $TableName Values(NULL, '$UserName','$Monday', '$Tuesday',
			'$Wednesday', '$Thursday', '$Friday')";
			$resultmode = MYSQLI_STORE_RESULT;
			$QueryResult = mysqli_query($DBConnect, $SQLstring , $resultmode);
			if ($QueryResult === FALSE){
				echo "<p>Unable to execute the query.</p>"
						."<p>Error code ". mysqli_errno($DBConnect)
						. ": " . mysqli_error($DBConnect) .
						"</p>";
			}
			else {
				echo "<h1>Thank You For Your Appointment Request!</h1>";
			}
		}
		mysqli_close($DBConnect);
	}
}
?>