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
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">   -->

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
        input[type="email"],
        input[type="password"],
        input[type="date"],
        textarea,
        input[type="file"],
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





            
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        #search {
            width: 300px;
            padding: 10px;
            margin-top: 20px;
        }

        #search-results {
            margin-top: 20px;
            text-align: left;
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
                            <li><a href="admin_Blog.php"><i class="fa-solid fa-cart-shopping"></i> Notice </a></li>
                            <li><a href="admin_Library.php"><i class="fa-solid fa-gear"></i> Library</a></li>
                            <li class="active"><a href="admin_Instructors.php"><i class="fa-solid fa-gear"></i> Instructors</a></li>
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







                    <div class="container" style="max-width: 50%;">
                        <div class="text-center mt-5 mb-4">
                            <h2>Instructor Search</h2>
                        </div>
                        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search ... ">
                    </div>
                    <div id="searchresult"></div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#live_search").keyup(function(){
                                var input = $(this).val();

                                if(input !== ""){
                                    $.ajax({
                                        url: "instructors_search.php",
                                        method: "POST",
                                        data: {input: input},
                                        success: function(data){
                                            $("#searchresult").html(data);
                                        }
                                    });
                                } else {
                                    $("#searchresult").html(""); // Clear the search results
                                }
                            });
                        });
                    </script>




                   
                    <hr>

                    <h2>Add New Instructor</h2>
                    <form action="admin_Instructors.php" method="post" enctype="multipart/form-data">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" required>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>

                        <label for="repeat_password">Repeat Password:</label>
                        <input type="password" id="repeat_password" name="repeat_password" required>

                        <label for="profile_picture">Profile Picture:</label>
                        <input type="file" id="profile_picture" name="profile_picture">

                        <label for="bio">Bio:</label>
                        <textarea id="bio" name="bio" rows="4" cols="50" required></textarea>

                        <input type="submit" value="Submit">
                    </form>




                <?php
                // Database connection details
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

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Process form data
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $dob = $_POST["dob"];
                    $password = $_POST["password"];
                    $bio = $_POST["bio"];
                    $email_type = "not verified"; // Default value for email type

                    // Handling profile picture upload
                    $targetDir = "teacher/";
                    $randomName = uniqid() . '-' . basename($_FILES["profile_picture"]["name"]);
                    $targetFilePath = $targetDir . $randomName;
                    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
                        // Insert data into database
                        $sql = "INSERT INTO Instructors (name, email, dob, password, profile_picture, bio, email_type)
                                VALUES ('$name', '$email', '$dob', '$password', '$targetFilePath', '$bio', '$email_type')";
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
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



                <hr>








                <?php // Delete instructor

                // Database connection details (Ensure this part is not repeated multiple times in the code)
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

                // Check if the 'id' parameter is set in the URL
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $instructor_id = $_GET['id'];

                    // SQL to delete record
                    $sql = "DELETE FROM Instructors WHERE id=$instructor_id";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                        // Redirect back to the same page after deletion
                        header("Location: admin_Instructors.php");
                        exit();
                    } else {
                        echo "Error deleting record: " . $conn->error;
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