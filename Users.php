<?php
	require_once("dbInfo.php");

	function addUsers($fName, $lName, $eMail, $password, $birthDate, $gender, $country, $bio, $admin, $mobile) {
		// Connect to database.
		$conn = mysqli_connect(getServer(), getUserName(), getPassword(), getDatabaseName());
		if(mysqli_connect_error()) {
			die("Could not connect to database. " . mysqli_connect_error());
		}

		// Insert query.
		$sql = "INSERT INTO `users`
				(
					`FName`,
					`LName`,
					`EMail`,
					`Password`,
					`BirthDate`,
					`Gender`,
					`Country`,
					`Bio`,
					`Admin`,
					`Mobile`
				)
				VALUES
				(
					?,
					?,
					?,
					?,
					STR_TO_DATE(?, '%d/%m/%Y'),
					?,
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
		mysqli_stmt_bind_param($stmt, 'ssssssssis', $fName, $lName, $eMail, $password, $birthDate, $gender, $country, $bio, $admin, $mobile);

		// Execute the statement.
		if(!mysqli_stmt_execute($stmt)) {
			die("Could not execute the statement. " . mysqli_stmt_error($stmt));
		}

		// Get value of the auto increment column.
		$newId = mysqli_insert_id($conn);

		// Close statement and connection.
		mysqli_stmt_close($stmt);
		mysqli_close($conn);

		// Return the id.
		return $newId;
	}

	function updateUsers($id, $fName, $lName, $eMail, $password, $birthDate, $gender, $country, $bio, $admin, $mobile) {
		// Connect to database.
		$conn = mysqli_connect(getServer(), getUserName(), getPassword(), getDatabaseName());
		if(mysqli_connect_error()) {
			die("Could not connect to database. " . mysqli_connect_error());
		}

		// Update query.
		$sql = "UPDATE	`users`
				SET		`FName` = ?,
						`LName` = ?,
						`Password` = ?,
						`BirthDate` = STR_TO_DATE(?, '%d/%m/%Y'),
						`Gender` = ?,
						`Country` = ?,
						`Bio` = ?,
						`Admin` = ?,
						`Mobile` = ?
				WHERE	`Id` = ?
				AND		`EMail` = ?;";

		// Prepare statement.
		$stmt = mysqli_prepare($conn, $sql);
		if($stmt === false) {
			die("Invalid SQL specified. " . mysqli_error($conn));
		}

		// Bind parameters.
		mysqli_stmt_bind_param($stmt, 'sssssssisis', $fName, $lName, $password, $birthDate, $gender, $country, $bio, $admin, $mobile, $id, $eMail);

		// Execute the statement.
		if(!mysqli_stmt_execute($stmt)) {
			die("Could not execute the statement. " . mysqli_stmt_error($stmt));
		}

		// Close statement and connection.
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}

	function isExisted($eMail) {
		// Connect to database.
		$conn = mysqli_connect(getServer(), getUserName(), getPassword(), getDatabaseName());
		if(mysqli_connect_error()) {
			die("Could not connect to database. " . mysqli_connect_error());
		}

		// Select query.
		$sql = "SELECT	`Id`
				FROM	`users`
				WHERE	`EMail` = ?;";

		// Prepare statement.
		$stmt = mysqli_prepare($conn, $sql);
		if($stmt === false) {
			die("Invalid SQL specified. " . mysqli_error($conn));
		}

		// Bind parameters.
		mysqli_stmt_bind_param($stmt, 's', $eMail);

		// Execute the statement.
		if(!mysqli_stmt_execute($stmt)) {
			die("Could not execute the statement. " . mysqli_stmt_error($stmt));
		}

		// Bind result and fetch records.
		mysqli_stmt_bind_result($stmt, $id);
		$list = Array();
		while(mysqli_stmt_fetch($stmt)) {
			$record = Array(
				"Id" => $id);

			array_push($list, $record);
		}

		// Close statement and connection.
		mysqli_stmt_close($stmt);
		mysqli_close($conn);

		return $list;
	}

	function getUser($eMail, $password) {
		// Connect to database.
		$conn = mysqli_connect(getServer(), getUserName(), getPassword(), getDatabaseName());
		if(mysqli_connect_error()) {
			die("Could not connect to database. " . mysqli_connect_error());
		}

		// Select query.
		$sql = "SELECT	`Id`,
						`FName`,
						`LName`,
						DATE_FORMAT(`BirthDate`, '%d/%m/%Y') AS BirthDate,
						`Gender`,
						`Country`,
						`Bio`,
						`Admin`,
						DATE_FORMAT(`CreationDate`, '%m/%d/%Y %h:%i %p') AS CreationDate,
						`Mobile`
				FROM	`users`
				WHERE	`EMail` = ?
				AND		`Password` = ?;";

		// Prepare statement.
		$stmt = mysqli_prepare($conn, $sql);
		if($stmt === false) {
			die("Invalid SQL specified. " . mysqli_error($conn));
		}

		// Bind parameters.
		mysqli_stmt_bind_param($stmt, 'ss', $eMail, $password);

		// Execute the statement.
		if(!mysqli_stmt_execute($stmt)) {
			die("Could not execute the statement. " . mysqli_stmt_error($stmt));
		}

		// Bind result and fetch records.
		mysqli_stmt_bind_result($stmt, $id, $fName, $lName, $birthDate, $gender, $country, $bio, $admin, $creationDate, $mobile);
		$list = Array();
		while(mysqli_stmt_fetch($stmt)) {
			$record = Array(
				"Id" => $id,
				"FName" => $fName,
				"LName" => $lName,
				"BirthDate" => $birthDate,
				"Gender" => $gender,
				"Country" => $country,
				"Bio" => $bio,
				"Admin" => $admin,
				"CreationDate" => $creationDate,
				"Mobile" => $mobile);

			array_push($list, $record);
		}

		// Close statement and connection.
		mysqli_stmt_close($stmt);
		mysqli_close($conn);

		return $list;
	}

	function changePassword($password, $id, $eMail) {
		// Connect to database.
		$conn = mysqli_connect(getServer(), getUserName(), getPassword(), getDatabaseName());
		if(mysqli_connect_error()) {
			die("Could not connect to database. " . mysqli_connect_error());
		}

		// Update query.
		$sql = "UPDATE	`users`
				SET		`Password` = ?
				WHERE	`Id` = ?
				AND		`EMail` = ?;";

		// Prepare statement.
		$stmt = mysqli_prepare($conn, $sql);
		if($stmt === false) {
			die("Invalid SQL specified. " . mysqli_error($conn));
		}

		// Bind parameters.
		mysqli_stmt_bind_param($stmt, 'sis', $password, $id, $eMail);

		// Execute the statement.
		if(!mysqli_stmt_execute($stmt)) {
			die("Could not execute the statement. " . mysqli_stmt_error($stmt));
		}

		// Close statement and connection.
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
?>