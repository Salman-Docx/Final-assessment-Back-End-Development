<html>
    <head>
        <title>PHP Test 1</title>
</head>
<body>
    <h1>PHP Test 1</h1>
<?php
    $host = "localhost" ;
    $username = "root";
    $password= "password";
    $dbname = "HR";

    $conn = mysqli_connect($host, $username, $password, $dbname);
     ?>
  </body>
</html>