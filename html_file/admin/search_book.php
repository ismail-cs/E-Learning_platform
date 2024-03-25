<?php
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_learning";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    
    try {
        $query = $conn->prepare("SELECT * FROM library WHERE book_name LIKE ?");
        $query->execute(["%$search%"]);
        
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($results);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

