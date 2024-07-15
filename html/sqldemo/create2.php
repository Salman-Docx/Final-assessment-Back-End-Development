<html>
    <head>
        <title>Add Data To Data Base</title>
</head>
<body>
    <h1>Add Data To Database</h1>
<?php
 include("db.php");

 $code = $_GET["country_code"];
 $name = $_GET["country_name"];
 $region = $_GET["country_region"];

 if ($code == "" OR $name == "" OR $region == ""){
    header("Location: create.php?result=invalid");
    die();
 }

 $query = "INSERT INTO `countries` (`country_id`, `country_name`, `country_region`, `region_id`) VALUES('" . $code ." ','" . $name ." ','" . $region ." '); ";

 try {
    $result = mysqli_query($conn, $query);
 } catch (Exeption $e) {
    if (mysqli_errno($conn)) {
        header("Location: create.php?result=duplicate");
        die();
    }
    echo("Failed to execute query: ".mysqli_error($conn));
    die();
 }
 header("Location: create.php?result=success");
 die();
 ?>
</body>
</html>