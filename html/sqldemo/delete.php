<html>
    <head>
        <title>Delete Data from Database</title>
        <?php include("db.php"); ?>
    </head>
    <body>
        <h1>Delete Data From Database</h1>
        <table>
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>    
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM `employees`;";
                    $result = mysqli_query($conn, $query);
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    foreach($rows as $row) {
                        echo("<tr>");
                        echo("    <td>" . $row["employee_id"] . "</td");
                        echo("    <td>" . $row["first_name"] . "</td");
                        echo("    <td>" . $row["last_name"] . "</td");
                        echo("    <td>" . $row["email"] . "</td");
                        echo("</tr>"); 
                        echo("      form action='delete2.php' method='GET>");
                        echo("         <input type='hidden' name= 'delete_id' value='" . $row["employee_id"] . "' />");
                        echo("         <button type='submit'>Delete</button>");
                        echo("       </form>");
                        echo("      </td>");
                        echo("</tr>");
                        
                
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>