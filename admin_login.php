

<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css_file/style_for_register.css">
   
</head>


<body>

            <section>
                <div class="left-section">
                    
                </div>
                

                <div class="right-section">
                    <div class="Registration-box">

                        <form action="admin_login.php" method="post">
                            <h2>Login</h2>
                            
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                                <input type="email" name="email" id="email" >    
                                <label for="email"><b>Email</b></label>
                                    
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="key-outline"></ion-icon></span>
                                <input type="password" name="password" id="password" >
                                <label for="password"><b>Password</b></label>
                            </div>
                        
                            <button type="submit" name="login"> <b> Login </b> </button>








                            <?php
    // Start the session
    //session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "db";
    $username = "ismail";
    $password = "password1";
    $dbname = "e_learning";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email) || empty($password)) {
            echo "Email and password are required.";
        } else {
            $sql = "SELECT * FROM admin_list2 WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row['verify'] == 0) {
                        // Store sensitive data in sessions
                        $_SESSION['user_otp'] = $row['OTP'];
                        $_SESSION['user_id'] = $row['id'];

                        // Redirect to verify.php
                        header("Location: verify.php");
                        exit();
                    } else {
                        // User is verified, proceed to admin dashboard
                        $user_name = $row['name'];
                        $_SESSION['user_name'] = $user_name;

                        header("Location: html_file/admin/admin_dashboard.php");
                        exit();
                    }
                } else {
                    echo "Invalid email or password.";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
?>







                        </form>
                    </div>
                </div>
                
            </section>
            
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
