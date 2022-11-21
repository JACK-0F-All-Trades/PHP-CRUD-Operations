<?php
    include_once('./config/config.php');

    $id = mysqli_real_escape_string($mysqlConnection, $_POST['id']);
    $firstName = mysqli_real_escape_string($mysqlConnection, $_POST['firstName']) ;

    $lastName = mysqli_real_escape_string($mysqlConnection, $_POST['lastName']);
    $officeAddress = mysqli_real_escape_string($mysqlConnection, $_POST['officeAddress']);
    $jobTitle = mysqli_real_escape_string($mysqlConnection,$_POST['jobTitle']);
    $reportsTo = mysqli_real_escape_string($mysqlConnection, $_POST['reportsTo']);
    echo "reached here! 1";
    if(!isset($_POST['submit'])){
        echo "reached here! 2";
        if(empty($id) || empty($firstName) || empty($lastName) || empty($officeAddress) || empty($jobTitle) || empty($reportsTo)){
            if(empty($id)){
                echo "<h1>ID is required!</h1>";
            }
            if(empty($firstName)){
                echo "<h1>First Name is required!</h1>";
            }
            if(empty($lastName)){
                echo "<h1>Last Name is required!</h1>";
            }if(empty($officeAddress)){
                echo "<h1>Office Address is required!</h1>";
            }if(empty($jobTitle)){
                echo "<h1>Job Title is required!</h1>";
            }if(empty($reportsTo)){
                echo "<h1>The \"Reports to\" field is empty!</h1>";
            }
            echo "<a href=\"javascript:self.history.back();\">Go back to previous page</a>";
        }else{
            echo "reached here 3.";
            $result = mysqli_query($mysqlConnection, "INSERT INTO employees(id, firstName, lastName, officeAddress, jobTitle, reportsTo) VALUES ('$id','$firstName', '$lastName', '$officeAddress', '$jobTitle', '$reportsTo');");
            echo "<h1>Employee Added</h1>";
            echo $result;
            $mysqlConnection->close();
            header("Location:index.php");
            
        }
        echo "reached here ! 4";
        
    }

    

?>