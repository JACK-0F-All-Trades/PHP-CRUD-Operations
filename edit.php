<?php
// including the database connection file
include_once(".\config\config.php");

if (isset($_POST['update'])) {

	$firstName = mysqli_real_escape_string($mysqlConnection, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($mysqlConnection, $_POST['lastName']);
	$jobTitle = mysqli_real_escape_string($mysqlConnection, $_POST['jobTitle']);
	$reportsTo = mysqli_real_escape_string($mysqlConnection, $_POST['reportsTo']);
	
	$officeAddress = mysqli_real_escape_string($mysqlConnection, $_POST['officeAddress']);
	$id = mysqli_real_escape_string($mysqlConnection, $_POST['id']);
	// checking empty fields
	// checking empty fields
	if (empty($firstName) || empty($lastName) || empty($jobTitle) || empty($officeAddress)) {

		if (empty($firstName)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}

		if (empty($lastName)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}

		

		if (empty($jobTitle)) {
			echo "<font color='red'>Job Title field is empty.</font><br/>";
		}


		if (empty($officeAddress)) {
			echo "<font color='red'>Office Code field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}
	else {
		//updating the table
		$result = mysqli_query($mysqlConnection, "UPDATE employees SET firstName='$firstName', lastName='$lastName', jobTitle='$jobTitle', reportsTo = '$reportsTo', officeAddress='$officeAddress' WHERE id=$id;");

		$mysqlConnection->close();
		//redirectig to the display page. In our case, it is index.php
		header("Location:index.php");
	}
}else{
    $id = $_GET['id'];
    echo $id;
    $result = mysqli_query($mysqlConnection, "SELECT * FROM employees WHERE id='$id';");
    while($res = mysqli_fetch_array($result)){
        $id = $res['id'];
        $firstName = $res['firstName'];
        $lastName = $res['lastName'];
        $officeAddress = $res['officeAddress'];
        $jobTitle = $res['jobTitle'];
        $reportsTo = $res['reportsTo'];
    }
    $mysqlConnection->close();
}
?>









<html>
    <head>
        <link rel="stylesheet" href="./table.css" />
        <title>Edit Employee Data</title>
    </head>
    <body>
        <form action="edit.php" method="post">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" value=<?php echo $firstName ?>>

            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" value=<?php echo $lastName ?>>

            <label for="officeAddress">Office Address</label>
            <input type="text" name="officeAddress" id="officeAddress" value=<?php echo $officeAddress ?>>

            <label for="jobTitle">Job Title</label>
            <input type="text" name="jobTitle" id="jobTitle" value=<?php echo $jobTitle ?>>

            <label for="reportsTo">Reports To</label>
            <input type="text" name="reportsTo" id="reportsTo" value=<?php echo $reportsTo ?>>

            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            <input type="submit" value="Update" name="update">
        </form>
    </body>
</html>