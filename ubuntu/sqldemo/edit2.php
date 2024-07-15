<html>
    <head>
        <title>Edit Data in Database</title>
        <?php
         include("db.php");
         $id = $_POST["edit_id"];

         $query = "SELECT `first_name`, `last_name`, `email` FROM `employees WHERE `employee_id` = '". $id . " ' ;";
         $result = mysqli_query($conn, $query);

         if(!$result) {
            echo("Failed to execute query:" . mysqli_error($conn));
            die();       
         }

         $number_of_rows_found = mysqli_affected_rows($conn);
         if ($number_of_rows_found == 0) {
            echo("No records deleted.");
            die();
         }

         $record = mysqli_fetch_assoc($result);
    ?>
  </head>
  <body>
    <h1>Edit Data in Database</h1>
    <form action="edit3.php" method="GET">
        <input name="employee_id" type="hidden" value="<?php echo($id); ?>" />
        <label for="first-name-input">Employee First Name:</label>
        <input id="first-name-input" name="emplyee_first_name" type="text" value="<?php echo($record['first name']); ?>" />
        <br />
        <label for="last-name-input">Employee Last Name:</label>
        <input id="last-name-input" name="employee_last_name" type="text" value="<?php echo($record[`last name`]); ?>" />
        <br />
        <label for="email-input">Employee Email Address:</label>
        <input id="email-input" name="employee_email" type="email" value="<?php echo($record['email']); ?>" />
        <br />
        <input type="submit" />
    </form>
  </body>
</html>
        