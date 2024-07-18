<?php
$servername = "localhost"; 
$username = "root";        
$password = "password";           
$dbname = "Rishton";    

$conn = new mysqli ( $servername , $username, $password , $dbname ) ;

if ( $conn->connect_error)  {
    die("Connection failed: "  . $conn->connect_error ) ;
}

if ($_SERVER["REQUEST_METHOD"]  == "POST" ) {
    
    $name = htmlspecialchars($_POST["name"]) ;
    $email = htmlspecialchars($_POST["email"]) ;
    $phone = htmlspecialchars($_POST["phone"]) ;

    if ($_POST["form_type"] === "pupil" ) {
        $class = htmlspecialchars($_POST[ "class"]);
        $guardian_id = htmlspecialchars($_POST[ "guardian_id"]);

        $stmt = $conn->prepare("INSERT INTO pupils (name, email, phone, class, guardian_id) VALUES (?, ?, ?, ?,?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $class, $guardian_id);

    } elseif ($_POST["form_type"] === "teacher") {
        $address = htmlspecialchars($_POST["address"]);
        $background = htmlspecialchars($_POST["background"]);

        $stmt = $conn->prepare("INSERT INTO teachers (name, email, phone, address, background) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $address, $background);

    } elseif ($_POST["form_type"] === "guardian") {
        $pupil_relation = htmlspecialchars($_POST["pupil_relation"]);
        $pupil_id = htmlspecialchars($_POST["pupil_id"]);

        $stmt = $conn->prepare("INSERT INTO guardians (name, email, phone, pupil_relation, pupil_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $pupil_relation, $pupil_id);
    }

    if ($stmt->execute()) {
        echo "<h1>Data Submitted Successfully</h1>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone</p>";
        if ($_POST["form_type"] === "pupil") {
            echo "<p>Class: $class</p>";
            echo "<p>Guardian ID: $guardian_id</p>";
        } 
        elseif ($_POST["form_type"] === "teacher") {
            echo " <p>Address: $address</p>";
            echo " <p>Background: $background</p>" ;
        } 
        elseif ($_POST["form_type"] === "guardian") {
            echo "<p>Relation to Pupil: $pupil_relation</p>";
            echo "<p> Pupil ID: $pupil_id</p>";
        }
    } else {
        echo "Error : " . $stmt->error;
    }

    $stmt->close();
} 
else {
    echo "<p>Invalid request.</p>";
}

$conn->close();
?>
