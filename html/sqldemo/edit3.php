<html>
    <head>
        <title>Edit Data in Database</title>
        <?php
         include("db.php");
         $id = $_GET["employee_id"];
         $first_name =$_GET["employee_first_name"];
         $last_name = $_GET["employee_last_name"];
         $email = $_GET["employee_email"];

         if($first_name == "" OR $last_name == "" OR $email == "") {
            header("Location: edit.php?result+invalid");
         }


         $query = "UPDATE `femployees` SET `first_name` = '". $first_name . "', `last_name` = '". $last_name . "', `email` = '" . $email . "' WHERE `employee_id` = '". $id . "';";
         $result = mysqli_query($conn, $query);

         if(!$result) {
            echo("Failed to execute query:" . mysqli_error($conn));
            die();       
         }

         header("Location: edit.php?result+success");
         die();
        ?>
    </tbody>
   </table>
  </body>
</html>