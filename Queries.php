<?php
	require_once("dbInfo.php");
    require 'Mail.php';

	function addQueries($user, $eMail, $qDept, $qState) {
		// Connect to database.
		$conn = mysqli_connect(getServer(), getUserName(), getPassword(), getDatabaseName());
		if(mysqli_connect_error()) {
			die("Could not connect to database. " . mysqli_connect_error());
		}

		// Insert query.
		$sql = "INSERT INTO `queries`
				(
					`Uid`,
					`EMail`,
					`QDept`,
					`QState`
				)
				VALUES
				(
					?,
					?,
					?,
					?
				);";

		// Prepare statement.
		$stmt = mysqli_prepare($conn, $sql);
		if($stmt === false) {
			die("Invalid SQL specified. " . mysqli_error($conn));
		}

		// Bind parameters.
		mysqli_stmt_bind_param($stmt, 'isss', $user[0]['Id'], $eMail, $qDept, $qState);

		// Execute the statement.
		if(!mysqli_stmt_execute($stmt)) {
			die("Could not execute the statement. " . mysqli_stmt_error($stmt));
		}

		// Get value of the auto increment column.
		$newId = mysqli_insert_id($conn);

		// Close statement and connection.
		mysqli_stmt_close($stmt);
		mysqli_close($conn);

        //sendMail($eMail);
		QuerySubMail($eMail, $user[0]['FName'],$user[0]['LName'], $qDept, $qState);
		
		// Return the id.
		return $newId;
	}
?>