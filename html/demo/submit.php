<?php
// Database connection details
$servername = "localhost"; // Change if your database server is different
$username = "root";        // Change to your database username
$password = "";            // Change to your database password
$dbname = "school_db";     // The database you created above

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Common variables
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);

    // Insert based on form type
    if ($_POST["form_type"] === "pupil") {
        $class = htmlspecialchars($_POST["class"]);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO pupils (name, email, phone, class) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $class);

    } elseif ($_POST["form_type"] === "teacher") {
        $address = htmlspecialchars($_POST["address"]);
        $background = htmlspecialchars($_POST["background"]);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO teachers (name, email, phone, address, background) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $address, $background);

    } elseif ($_POST["form_type"] === "guardian") {
        $pupil_relation = htmlspecialchars($_POST["pupil_relation"]);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO guardians (name, email, phone, pupil_relation) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $pupil_relation);
    }

    // Execute insert
    if ($stmt->execute()) {
        echo "<h1>Data Submitted Successfully</h1>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone</p>";
        if ($_POST["form_type"] === "pupil") {
            echo "<p>Class: $class</p>";
        } elseif ($_POST["form_type"] === "teacher") {
            echo "<p>Address: $address</p>";
            echo "<p>Background: $background</p>";
        } elseif ($_POST["form_type"] === "guardian") {
            echo "<p>Relation to Pupil: $pupil_relation</p>";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<p>Invalid request.</p>";
}

$conn->close();
?>
