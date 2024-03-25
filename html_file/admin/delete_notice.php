<?php
// Ensure that a notice ID was received through POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    // Retrieve notice ID from the form
    $notice_id = $_POST['notice_id'];

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

    // SQL query to delete the notice based on its ID
    $sql = "DELETE FROM notices WHERE id = $notice_id";

    if ($conn->query($sql) === TRUE) {
        echo "Notice deleted successfully";
    } else {
        echo "Error deleting notice: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request";
}



header("Location: admin_Blog.php");
exit();

?>

