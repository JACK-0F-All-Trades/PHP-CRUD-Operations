<?php
    include_once('./config/config.php');
    $result = mysqli_query($mysqlConnection, "SELECT employees.id, employees.firstName, employees.lastName, employees.officeAddress, employees.jobTitle, employees.reportsTo FROM employees;");
?>

<html>
    <head>
        <<link rel="stylesheet" type="text/css" href="./table.css">
        <title>CRUD Operations</title>
    </head>
    <body>
        <a href="add.html">Add a new Employee</a>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Office Address</th>
                <th>Job Title</th>
                <th>Reports To</th>
            </tr>

            <?php
                while($res = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$res['id']."</td>";
                    echo "<td>".$res['firstName'].$res['lastName']."</td>";
                    echo "<td>".$res['officeAddress']."</td>";
                    echo "<td>".$res['jobTitle']."</td>";
                    echo "<td>".$res['reportsTo']."</td>";
                    echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    echo "</tr>";
                }
                $mysqlConnection->close();
            ?>
        </table>
    </body>
</html>