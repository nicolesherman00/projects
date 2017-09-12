<?php
set_time_limit(0);
$DBConnect = new mysqli("localhost", "root");
if ($DBConnect === FALSE)
	echo "<p>Unable to connect to the database server. </p>
			"."<p>Error code ".mysqli_errno().": ".
			mysqli_error()."</p>";
else {
	$DBName = "schedule";
	if (!@mysqli_select_db($DBConnect, $DBName))
		echo "<p> There are no current requests.</p>";
	else {
		$TableName = "Appointments";
		$SQLstring = "SELECT * FROM $TableName";
		$resultmode = MYSQLI_STORE_RESULT;
		$QueryResult = mysqli_query($DBConnect, $SQLstring , $resultmode);
		if (mysqli_num_rows($QueryResult) == 0)
			echo "<p> There are no current requests.</p>";
		else {
			echo "<p>The following requests have been submitted:</p>";
			echo "<table border='1'>";
			echo "<tr><th colspan='6'>Requests</th></tr>";
			while (!empty($Row = mysqli_fetch_assoc($QueryResult))
					!== FALSE) {
						echo "<tr><td>{$Row['user_name']}</td>";
						echo "<td>{$Row['schedule_appt_mon']}
						</td>";
						echo "<td>{$Row['schedule_appt_tues']}
						</td>";
						echo "<td>{$Row['schedule_appt_wed']}
						</td>";
						echo "<td>{$Row['schedule_appt_thurs']}
						</td>";
						echo "<td>{$Row['schedule_appt_fri']}
						</td></tr>";
					}
					echo "</table>";
		}
		mysqli_free_result($QueryResult);
	}
	mysqli_close($DBConnect);
}
?>