<?php   
    session_start();
    
?>

<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header("Location: ../../admin_login.php");
    exit();
}
// Rest of your code goes here...
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css_file/student_css/style_for_student_dashboard.css">

    <style>
        

        .admin_info {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            float: left;
            margin-left: 30px;
            margin-top: 30px;
            background: #D6EAF8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    
        

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>



</head>
<body>

    
        <section class="page">
            <div class="sec1">
                <div class="left">
                    <div class="up">
                        <img class="img" src="../../images/829459_man_512x512.png" alt="Image loading failed" style="width:200px;height:200px; border-radius: 50%;" >
                    </div>

                    <div class="down">

                        <ul>
                            <li class="active"><a href="admin_dashboard.php"><i class="fa-solid fa-gauge"></i> Home</a></li>
                            <li><a href="admin_Categories.php"><i class="fa-solid fa-user"></i>  Categories</a></li>
                            <li><a href="admin_Courses.php"><i class="fa-solid fa-graduation-cap"></i> Courses</a></li>
                            <li><a href="admin_Content.php"><i class="fa fa-heart-o"></i> Content</a></li>
                            <li><a href="admin_Blog.php"><i class="fa-solid fa-cart-shopping"></i> Notice</a></li>
                            <li><a href="admin_Library.php"><i class="fa-solid fa-gear"></i> Library</a></li>
                            <li><a href="admin_Instructors.php"><i class="fa-solid fa-gear"></i> Instructors</a></li>
                            <li><a href="admin_Team.php"><i class="fa-solid fa-gear"></i> Settings</a></li>
                            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout </a> </li>
                            
                        </ul>
                    </div>
                </div>
                
                
                <div class="right">

                    <div class="name">
                        <h1>Welcome <?php echo $_SESSION['user_name'] ?>  </h1>
                    </div>
                   
                    <hr>


					<h2>Insert Admin</h2>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nameId">Full Name</label>
                            <input type="text" id="nameId" placeholder="Full Name" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+" />
                            <?php if(isset($message_name)){ echo $message_name; } ?>
                        </div>

                       


                        <div class="form-group">
                            <label for="emailId">Email</label>
                            <input type="email" id="emailId" placeholder="Email" name="email" class="form-control" title="someone@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                            <?php if(isset($message_email)){ echo $message_email; } ?>
                        </div>

                        

                        <div class="form-group">
                            <label for="passwordId1">Password</label>
                            <input type="password" id="passwordId1" placeholder="Password" name="password" class="form-control" required minlength="6" />
                            <?php if(isset($message_pass)){ echo $message_pass; } ?>
                        </div>

                       
                       
                        <div class="form-group">
                            <label for="passwordId2">Confirm Password</label>
                            <input id="passwordId2" type="password" placeholder="Confirm Password" name="c_password" class="form-control" required minlength="6" />
                            <?php if(isset($message_c_pass)){ echo $message_c_pass; } ?>
                        </div>


                        

                        <div class="form-group">
                            <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                        </div>
                    </form>







                    <?php
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                       
                        $servername = "localhost"; // Replace with your MySQL server name
                        $username = "root";       // Replace with your MySQL username
                        $password = "";       // Replace with your MySQL password
                        $dbname = "e_learning";            // Replace with your database name

                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        // Check the connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Retrieve user inputs from the form
                        $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
                        $email = mysqli_real_escape_string($conn, $_POST["email"]);
                        $password = mysqli_real_escape_string($conn, $_POST["password"]);
                        $c_password = mysqli_real_escape_string($conn, $_POST["c_password"]);

                        // Check if passwords match
                        if ($password != $c_password) {
                            $message_c_pass = "Passwords do not match.";
                            // You may want to handle this error and display a message to the user
                        } else {
                            // Hash the password before storing it in the database (for security)
                            //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

                            // SQL query to insert data into the admin table
                            $sql = "INSERT INTO admin (name, admin_mail, password) VALUES ('$fullname', '$email', '$password')";

                            // Perform the query
                            if (mysqli_query($conn, $sql)) {
                                echo "Record inserted successfully";
                                // You may want to redirect the user or display a success message
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                // You may want to handle this error and display a message to the user
                            }
                        }

                        // Close the database connection
                        mysqli_close($conn);
                    }
                    ?>






                    <hr style="width:50%;text-align:left;margin-left:0; margin-top:80px">





                     <h1>  Admin list </h1>


                    <div class="admin_info">


                    

                        <?php
                        // Establish a connection to the database
                        $servername = "localhost"; // Replace with your MySQL server name
                        $username = "root";       // Replace with your MySQL username
                        $password = "";       // Replace with your MySQL password
                        $dbname = "e_learning";              // Replace with your database name

                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        // Check the connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // SQL query to retrieve all data from the admin table
                        $sql = "SELECT * FROM admin";
                        $result = mysqli_query($conn, $sql);

                        // Check if the query was successful
                        if ($result) {
                            // Check if there are rows in the result set
                            if (mysqli_num_rows($result) > 0) {
                                // Display the data in a table
                                echo "<table border='1'>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>";

                                // Output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>{$row['name']}</td>
                                            <td>{$row['admin_mail']}</td>
                                        </tr>";
                                }

                                echo "</table>";
                            } else {
                                echo "No records found";
                            }
                        } else {
                            // Error in the query
                            echo "Error: " . mysqli_error($conn);
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>

                    </div>



                   


                    




                </div>
            </div>

        </section>
    
</body>
</html>
