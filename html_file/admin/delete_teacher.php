<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_learning";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the teacher ID was received through POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    // Retrieve teacher ID from the form
    $teacher_id = $_POST['teacher_id'];

    // SQL query to delete the teacher based on its ID
    $sql = "DELETE FROM instructors WHERE id = $teacher_id";

    if ($conn->query($sql) === TRUE) {
        echo "Teacher deleted successfully";
    } else {
        echo "Error deleting teacher: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close the connection
$conn->close();


header("Location: admin_Instructors.php");
exit();

?>

