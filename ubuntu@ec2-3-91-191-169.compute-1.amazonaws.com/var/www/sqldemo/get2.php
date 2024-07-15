<html>
    <head>
        <title>Get Data from Database</title>
        <?php include("db.php"); ?>
    </head>
    <body>
        <h1>Get Data From Database</h1>
        <table>
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>    
            </thead>
            <tbody>
                <?php 
                if (!isset($_Get["first_name"])){
                    $_Get["first_name"] = "";
                }
                    $query = "SELECT * FROM `employees` WHERE `first_name` LIKE '%" . $_Get["first_name"]. "%';";
                    $result = mysqli_query($conn, $query);
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    foreach($rows as $row) {
                        echo("<tr>");
                        echo("    <td>" . $row["employee_id"] . "</td");
                        echo("    <td>" . $row["first_name"] . "</td");
                        echo("    <td>" . $row["last_name"] . "</td");
                        echo("    <td>" . $row["email"] . "</td");
                        echo("</tr>");
                
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>