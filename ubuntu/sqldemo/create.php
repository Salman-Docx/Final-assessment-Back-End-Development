<html>
    <head>
        <title>Add Data to Database</title>
        <?php include("db.php"); ?>
</head>
<body>
    <h1>Add Data to Database</h1>
    <?php
    if (isset($_GET["result"])) {
        if($_GET["result"] == "success"){
            echo("<p>Your Record was added successfully.</p>");
        } else if ($_GET["result"] == "duplicate") {
            echo("<p> The country code you entered is already in use.</p>");
        } else if ($_GET["result"] == "invalid") {
            echo("<p> You must complete all input fields.</p>");
        }
    }
   ?>
    <form action="create2.php" method="GET">
        <label for="code-input">Country Code:</label>
        <input
            id="code-input"
            maxlength="2"
            minlength="2"
            name="country_code"
            type="text"
        />
        <br />
        <label for="name-input">Country Name:</label>
        <input id="name-input" name="country_name" type="text" />
        <br />
        <label for="region-input">Region ID:</label>
        <select id="region-input" name="country_region">
            <option></option>
            <?php
                $query = "SELECT * FROM `regions`";
                $result = mysqli_query($conn, $query);
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach($rows as $row){
                    echo("<option value='" . $row['region_id']. " '>");
                    echo($row['region_name']);
                    echo("</option");
                }
                ?>
            </select>
            <br />
        
        <input type="submit" />
    </form>
  </body>
</html>