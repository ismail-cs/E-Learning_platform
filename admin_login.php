

<?php

session_start();

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
                            // Establish a connection to the database
                            $servername = "localhost"; // Replace with your MySQL server name
                            $username = "root";       // Replace with your MySQL username
                            $password = "";           // Replace with your MySQL password
                            $dbname = "e_learning";   // Replace with your database name

                            $conn = mysqli_connect($servername, $username, $password, $dbname);

                            // Check the connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Check if the form is submitted
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
                                // Retrieve user input
                                $email = $_POST["email"];
                                $password = $_POST["password"];

                                // Check if email and password are not empty
                                if (empty($email) || empty($password)) {
                                    echo "Email and password are required.";
                                    
                                } else {
                                    // SQL query to check if the provided email and password match
                                    $sql = "SELECT * FROM admin WHERE admin_mail = '$email' AND password = '$password'";
                                    $result = mysqli_query($conn, $sql);

                                    // Check if the query was successful
                                    if ($result) {
                                        // Check if a matching row is found
                                        if (mysqli_num_rows($result) == 1) {
                                            // Login successful
                                            
                                             $row = mysqli_fetch_assoc($result);
					    $user_name = $row['name']; // Replace 'name' with the column name in your 'admin' table

					    // Start a session and store the user's name
					    session_start();
					    $_SESSION['user_name'] = $user_name;
                                            
                                            header("Location: html_file/admin/admin_dashboard.php");
                                            exit();
                                        } else {
                                            // Incorrect email or password
                                            echo "Invalid email or password.";
                                        }
                                    } else {
                                        // Error in the query
                                        echo "Error: " . mysqli_error($conn);
                                    }

                                    // Close the database connection
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
