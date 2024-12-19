<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
  <title>OPT Input Form</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }
    h2 {
      color: #333;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
      width: 50%;
      display: block;
      margin-bottom: 8px;
    }
    input[type="text"] {
      width: 50%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    p {
      margin-top: 20px;
      text-align: left;
    }
    a {
      color: #007bff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>




</head>
<body>

<h2>Enter your OTP</h2>

<form action="verify2.php" method="post">
  <label for="opt">OTP:</label>
  <input type="text" id="opt" name="opt"><br><br>
  <input type="submit" value="Submit">
  <p>Go to <a href="admin_login.php">login</a></p>
</form>




<?php
session_start(); // Start the session

if(isset($_GET['otp']) && isset($_GET['id'])) {
    $user_otp = $_GET['otp'];
    $user_id = $_GET['id'];

    // Storing values in session variables
    $_SESSION['otp'] = $user_otp;
    $_SESSION['id'] = $user_id;

}
?>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opt = $_POST['opt'];



// Database connection credentials
$servername = "db";
$username = "ismail";
$password = "password1";
$dbname = "e_learning";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Compare OTP values
if ($opt === $_SESSION['otp']) {
    // Update verify column if OTP matches
    $id = $_SESSION['id'];
    $sql = "UPDATE admin_list2 SET verify = 1 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "OTP matched and 'verify' column updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "OTP does not match";
}

$conn->close();

}
?>








</body>
</html>


