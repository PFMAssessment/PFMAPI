<?php
// Connect to database
try {
    $conn = new PDO("sqlsrv:server = tcp:pfmassessment.database.windows.net,1433; Database = PFM_Assessment_A", "DBadmin", "Password1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "DBadmin", "pwd" => "Password1", "Database" => "PFM_Assessment_A", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:pfmassessment.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
// Get values from the UI
if(isset($_POST["downloadBB"])){
	// Check if file already exists
	if(file_exists($target_file)){
		// Update the file using SQL
		
	}
	else {
		// insert the file into the database
		$sql = "INSERT INTO AssessmentA (Zip, Product, Recorded, ORG_User, Modified_User)
					VALUES ('06052', 'Frontier 88.7%, Xfinity From Comcast 99.9%', '4/18/2019', 'admin_UL', 'admin_UL')";
		if($conn->query($sql) === TRUE){
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

//close connection
$conn->close();
?>