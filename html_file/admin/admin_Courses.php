
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
                            <li  class="active"><a href="admin_Courses.php"><i class="fa-solid fa-graduation-cap"></i> Courses</a></li>
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



                    <h2>Create Course</h2>

                    <form method="post" enctype="multipart/form-data">
                        <div>
                            <label for="courseNameId">Course Name</label>
                            <input type="text" id="courseNameId" name="course_name" required>
                        </div>

                       

                        <div>
                            <label for="courseCoverId">Course Cover Photo</label>
                            <input type="file" id="courseCoverId" name="course_cover_photo" accept="image/*" required>
                        </div>

                        

                        <div>
                            <label for="courseDescriptionId">Course Description</label>
                            <textarea id="courseDescriptionId" name="course_description" rows="5" required></textarea>
                        </div>

                        

                        <div>
                            <label for="priceId">Price</label>
                            <input type="number" id="priceId" name="price" step="0.01" required>
                        </div>

                       

                        <div>
                            <button type="submit" name="submit">Submit</button>
                        </div>

                        
                        <?php
                        if (isset($_POST['submit'])) {
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "e_learning";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $course_name = $_POST['course_name'];
                            $course_cover_photo = $_FILES['course_cover_photo']['name'];
                            $course_description = $_POST['course_description'];
                            $price = $_POST['price'];

                            // Move the uploaded file to a designated folder
                            $target_dir = "html_file/admin/uploads/";
                            $target_file = $target_dir . basename($_FILES["course_cover_photo"]["name"]);
                            move_uploaded_file($_FILES["course_cover_photo"]["tmp_name"], $target_file);

                            // Insert data into the courses table
                            $sql = "INSERT INTO courses (course_name, course_cover_photo, course_description, price) 
                                    VALUES ('$course_name', '$target_file', '$course_description', '$price')";

                            if ($conn->query($sql) === TRUE) {
                                echo "Course created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                            $conn->close();
                        }
                        ?>

                    </form>



                </div>
       
            </div>

        </section>









               
</body>
</html>
