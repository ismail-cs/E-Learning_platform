
<?php

session_start(); // Start the session

//if(isset($_GET['otp']) && isset($_GET['id'])) {
  //  $user_otp = $_GET['otp'];
    //$user_id = $_GET['id'];

    // Storing values in session variables
   // $_SESSION['otp'] = $user_otp;
   // $_SESSION['id'] = $user_id;


  //  $_SESSION['user_otp'] = $row['OTP'];
  //  $_SESSION['user_id'] = $row['id'];


//}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="css_file/verify.css">
</head>
<body>

<div class="form" style="text-align: center;">
        <h2>Verify your Account</h2>
        <p>we emailed you the four digit otp code to Enter the code below to confirm your email address</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
            
                <div class="fields-input">
                    <input type="number" name="otp1" class="otp_field" placeholder="0" min="0" max="9" required>
                    <input type="number" name="otp2" class="otp_field" placeholder="0" min="0" max="9" required>
                    <input type="number" name="otp3" class="otp_field" placeholder="0" min="0" max="9" required>
                    <input type="number" name="otp4" class="otp_field" placeholder="0" min="0" max="9" required>
                </div>

                <div class="submit">
                    <input type="submit" value="Verify Now" class="button">
                    <p>Go to <a href="admin_login.php">login</a></p>
                </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $otp1 = $_POST['otp1'];
            $otp2 = $_POST['otp2'];
            $otp3 = $_POST['otp3'];
            $otp4 = $_POST['otp4'];

            // Combine the four digits
            $combined_value = $otp1 . $otp2 . $otp3 . $otp4;

            $_SESSION['opt'] = $combined_value;


            // Output the combined value
            



            //------------------

            
            //-----------



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
                if ($_SESSION['opt'] === $_SESSION['user_otp']) {
                    // Update verify column if OTP matches
                    $id = $_SESSION['user_id'];
                    $sql = "UPDATE admin_list2 SET verify = 1 WHERE id = $id";

                    if ($conn->query($sql) === TRUE) {
                        echo "Your Account Verified successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                } else {
                    echo "OTP does not match";
                }

                $conn->close();

        }
        ?>
    </div> 










<?php
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {


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
if ($_SESSION['opt'] === $_SESSION['otp']) {
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
*/
?>

    <script src="verify.js"></script>
    
</body>
</html>