<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css_file/style_for_register.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
-->

            <style> 
                /* CSS for the message box */
                .success-message-box {
                    background-color: #e2f0e4;
                    border: 2px solid #4CAF50;
                    padding: 10px;
                    text-align: center;
                    margin: 20px auto;
                    width: 15%;
                }
                .failed-message-box {
                    background-color:  #f6abab ;
                    border: 2px solid  #f97878 ;
                    padding: 10px;
                    text-align: center;
                    margin: 20px auto;
                    width: 20%;
                }
            </style>
</head>
<body>

            <section>
                <div class="left-section">
                    <img src="../images/2451060.jpg" alt="Background Image" style="width:800px;height:660px; padding-left: 150px;">
                </div>
                

                <div class="right-section">
                    <div class="Registration-box">

                    <?php

                        if(isset($_POST["signup"])) {
                            $fullName = $_POST['fullName'];
                            $userName = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $passwordRepeat = $_POST['repeatPassword'];
                            
                            $error = array();

                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                array_push($error, "Email is not valid");
                            }
                            if(strlen($password)<8) {
                                array_push($error, "Password must be at least 8 charactes long");
                            }
                            if($password!== $passwordRepeat) {
                                array_push($error, "Password does not match");
                            }

                            if(count($error)>0) {
                                foreach ($error as $error) {
                                    echo "<div class='failed-message-box'> $error </div>";
                                }
                            }
                            else{
                                
                                $hostName = "localhost";
                                $dbUser = "root";
                                $dbPassword = "";
                                $dbName = "e_learning_platform";
                                $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
                                if (!$conn) {
                                    die("Something went wrong");
                                }

                                $sql = "INSERT INTO student_reg(full_name, username, email, password) VALUES ( ?, ?, ?, ? )";
                                $stmt = mysqli_stmt_init($conn);
                                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                                if ($prepareStmt) {
                                    mysqli_stmt_bind_param($stmt, "ssss", $fullName, $userName, $email, $password);
                                    mysqli_stmt_execute($stmt);
                                }
                            }
                        }
                    ?>


                        <form action="ragistration_page.php" method="post">
                            <h2>Register</h2>
                            
                            
                            
                            <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                                <input type="text" name="fullName" id="fullName" required>
                                <label for="fullName"><b>Full Name</b></label>
                            </div>

                            <div class="input-box">
                                <span class="icon"><ion-icon name="person"></ion-icon></span>
                                    <input type="text" name="username" id="username" required>
                                    <label for="username"><b>Username</b></label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                                <input type="email" name="email" id="email" required>    
                                <label for="email"><b>Email</b></label>
                                    
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="key-outline"></ion-icon></span>
                                <input type="password" name="password" id="password" required>
                                <label for="password"><b>Password</b></label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="key-outline"></ion-icon></span>
                                <input type="password" name="repeatPassword" id="repeatPassword" required>
                                <label for="repeatPassword"><b>Repeat Password</b></label>
                            </div>



                            
                            <button type="submit" name="signup"> <b> Sign Up </b> </button>
                            <div class="register-link">
                                <p>Already have an account?<a href="../html_file/login_page.html">Sign In</a></p>
                            </div>


                        </form>
                    </div>
                </div>
                
            </section>


            <!-- Message box for successful registration -->
            <?php
            if (isset($_POST["signup"])) {
                // Check if registration is successful
                if (count($error) === 0) {
                    echo '<div class="success-message-box">You are registered successfully</div>';
                }
                else{
                    echo '<div class="failed-message-box">somthing went wrong</div>';
                }
            }
            ?>
            
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

           

</body>
</html>