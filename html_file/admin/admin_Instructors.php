
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






        .ins {
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
                            <li><a href="admin_dashboard.php"><i class="fa-solid fa-gauge"></i> Home</a></li>
                            <li><a href="admin_Categories.php"><i class="fa-solid fa-user"></i>  Categories</a></li>
                            <li><a href="admin_Courses.php"><i class="fa-solid fa-graduation-cap"></i> Courses</a></li>
                            <li><a href="admin_Content.php"><i class="fa fa-heart-o"></i> Content</a></li>
                            <li><a href="admin_Blog.php"><i class="fa-solid fa-cart-shopping"></i> Notice</a></li>
                            <li><a href="admin_Library.php"><i class="fa-solid fa-gear"></i> Library</a></li>
                            <li  class="active"><a href="admin_Instructors.php"><i class="fa-solid fa-gear"></i> Instructors</a></li>
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

                   
                    <form action="admin_Instructors.php" method="post" enctype="multipart/form-data">
                         <h2>Add Instructor</h2>
                        <div>
                            <label for="fullName">Full Name:</label>
                            <input type="text" id="fullName" name="full_name" required>
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div>
                            <label for="dateOfBirth">Date of Birth:</label>
                            <input type="date" id="dateOfBirth" name="date_of_birth">
                        </div>
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div>
                            <label for="repeatPassword">Repeat Password:</label>
                            <input type="password" id="repeatPassword" name="repeat_password" required>
                        </div>
                        <div>
                            <label for="profilePicture">Profile Picture:</label>
                            <input type="file" id="profilePicture" name="profile_picture">
                        </div>
                        <div>
                            <label for="bio">Bio:</label>
                            <textarea id="bio" name="bio" rows="4"></textarea>
                        </div>
                        <div>
                            <button name="submit" type="submit">Add Teacher</button>
                        </div>
                    </form>

                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

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

                    // Retrieve form data
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $date_of_birth = $_POST['date_of_birth'];
                    $password = $_POST['password'];
                    $repeat_password = $_POST['repeat_password'];
                    $profile_picture = $_FILES['profile_picture']['name'];
                    $bio = $_POST['bio'];

                    // Check if passwords match
                    if ($password !== $repeat_password) {
                        die("Passwords do not match");
                    }

                    // Hash the password for security
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Prepare and execute SQL insertion query
                    $sql = "INSERT INTO instructors (full_name, email, date_of_birth, password, profile_picture, bio) 
                            VALUES ('$full_name', '$email', '$date_of_birth', '$hashed_password', '$profile_picture', '$bio')";

                    if ($conn->query($sql) === TRUE) {
                        // Upload profile picture to a directory (optional)
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES['profile_picture']['name']);
                        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);

                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    // Close the connection
                    $conn->close();

                    }
                    ?>


                    <hr>


                    <div class = "ins">
                    <h1>  Instructor list </h1>


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

                    // Fetch data from the teachers table
                    $sql = "SELECT * FROM instructors";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Display data in a table
                        echo "<table border='1'>";
                        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Date of Birth</th><th>Profile Picture</th><th>Bio</th><th>Action</th></tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['full_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['date_of_birth'] . "</td>";
                            echo "<td><img src='" . $row['profile_picture'] . "' width='50' height='50'></td>";
                            echo "<td>" . $row['bio'] . "</td>";
                            
                            // Add delete button with a form for each row
                            echo "<td>";
                            echo "<form method='post' action='delete_teacher.php'>";
                            echo "<input type='hidden' name='teacher_id' value='" . $row['id'] . "' />";
                            echo "<button type='submit' name='delete'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No teachers found.";
                    }

                    // Close the connection
                    $conn->close();
                    ?>

                </div>



                    
                    
                </div>
            </div>

        </section>
    
</body>
</html>