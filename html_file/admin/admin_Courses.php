
<?php   
    session_start();

    error_reporting(E_ALL);
ini_set('display_errors', 1);
    
?>



<?php


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
            margin-bottom: 30px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        select,
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
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
                            <li><a href="admin_dashboard.php"><i class="fa-solid fa-gauge"></i> Home</a></li>
                            <li><a href="admin_Categories.php"><i class="fa-solid fa-user"></i>  Categories</a></li>
                            <li class="active"><a href="admin_Courses.php"><i class="fa-solid fa-graduation-cap"></i> Courses</a></li>
                            <li><a href="admin_Content.php"><i class="fa fa-heart-o"></i> Content</a></li>
                            <li><a href="admin_Blog.php"><i class="fa-solid fa-cart-shopping"></i> Notice </a></li>
                            <li><a href="admin_Library.php"><i class="fa-solid fa-gear"></i> Library</a></li>
                            <li><a href="admin_Instructors.php"><i class="fa-solid fa-gear"></i> Instructors</a></li>
                            <li><a href="admin_settings.php"><i class="fa-solid fa-gear"></i> Settings</a></li>
                            
                            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout </a> </li>
                            
                        </ul>
                    </div>
                </div>
                
                
                <div class="right">

                    <div class="name">
                        <h1>Welcome <?php echo $_SESSION['user_name'] ?>  </h1>
                    </div>
                   
                    <hr>



                     <h2>Create a New Course</h2>
    <form action="admin_Courses.php" method="post" enctype="multipart/form-data">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required><br><br>

        <label for="course_type">Course Type:</label>
        <select id="course_type" name="course_type" required>
            <?php
                // Database connection details
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

                // Fetch course types from 'categories' table
                $sql = "SELECT id, category_name FROM categories";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["category_name"] . "</option>";
                    }
                }

                // Close the database connection
                $conn->close();
            ?>
        </select><br><br>

        <label for="instructor">Instructor:</label>
        <select id="instructor" name="instructor" required>
            <?php
                // Database connection details (similar to the above)
                // Fetch instructors from 'Instructors' table
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                $sql = "SELECT id, name FROM Instructors";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }
                }

                // Close the database connection
                $conn->close();
            ?>
        </select><br><br>

        <label for="cover_photo">Cover Photo:</label>
        <input type="file" id="cover_photo" name="cover_photo" required><br><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>

        <label for="course_description">Course Description:</label><br>
        <textarea id="course_description" name="course_description" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Create Course">
    </form>












    <?php
    // Database connection details
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data
        $course_name = $_POST["course_name"];
        $course_type = $_POST["course_type"];
        $instructor = $_POST["instructor"];
        $price = $_POST["price"];
        $course_description = $_POST["course_description"];
        $cover_photo = ""; // Initialize cover photo variable
        $course_sale = 0;

        // Handling cover photo upload
        $targetDir = "course_photos/";
        $randomName = uniqid() . '-' . basename($_FILES["cover_photo"]["name"]);
        $targetFilePath = $targetDir . $randomName;
        if (move_uploaded_file($_FILES["cover_photo"]["tmp_name"], $targetFilePath)) {
            $cover_photo = $targetFilePath;
            // Insert data into database
            $sql = "INSERT INTO course2 (course_name, course_type, instructor, cover_photo, price, course_description, course_sale)
                    VALUES ('$course_name', '$course_type', '$instructor', '$cover_photo', '$price', '$course_description', '$course_sale')";
            if ($conn->query($sql) === TRUE) {
                echo "New course created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file";
        }
    }

    // Close the database connection
    $conn->close();
    ?>

                    




                






           

               
                </div>
            </div>
        </section>
    
</body>
</html>