

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
                            <li><a href="admin_Courses.php"><i class="fa-solid fa-graduation-cap"></i> Courses</a></li>
                            <li><a href="admin_Content.php"><i class="fa fa-heart-o"></i> Content</a></li>
                            <li  class="active"><a href="admin_Blog.php"><i class="fa-solid fa-cart-shopping"></i> Notice </a></li>
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

                    <div class="dash">
                        
                    </div>

                    <hr>




                    <section id="page-title">

                        

                        <form action="admin_Blog.php" method="post" enctype="multipart/form-data">
                            <h2>Insert Notice</h2>
                            <div class="form-group">
                                <label for="fullnameId">Notice Name</label>
                                <input type="text" id="fullnameId" placeholder="Notice Name" name="noticename" class="form-control">
                            </div>

                           

                            <div class="form-group">                    
                                <label>Date Selection</label>
                                <input type="date" class="form-control" name="date_op">
                            </div>

                            

                    
                            <div class="form-group">
                                <label for="descriptionId">Notice</label>
                                <textarea id="descriptionId" class="form-control" name="description" rows="7"></textarea>
                            </div>

                            
                    
                            <div class="form-group">
                                <button name="submit" class="btn btn-block btn-success" onclick="uploadFile()" type="submit">Submit</button>
                            </div>




                           



                            <?php
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

                            if (isset($_POST['submit'])) {
                                // Get values from the form
                                $noticename = $_POST['noticename'];
                                $date_op = $_POST['date_op'];
                                $description = $_POST['description'];

                                // Prepare and execute the SQL query
                                $sql = "INSERT INTO notices (noticename, date_op, description) VALUES ('$noticename', '$date_op', '$description')";

                                if ($conn->query($sql) === TRUE) {
                                    echo "Notice inserted successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }

                            // Close the connection
                            $conn->close();
                            ?>







                        </form>

                    </section>









  <hr>



                    <div class="notice-container">
                        <h2>Notice Board</h2>

                        <?php
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

                        // Fetch data from the notices table
                        $sql = "SELECT * FROM notices";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Display data in a table
                            echo "<table border='1'>";
                            echo "<tr><th>Notice Name</th><th>Date</th><th>Description</th><th>Action</th></tr>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['noticename'] . "</td>";
                                echo "<td>" . $row['date_op'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                
                                // Add a column with a delete button

                                
                                echo "<td><form method='post' action='delete_notice.php'>";
                                echo "<input type='hidden' name='notice_id' value='" . $row['id'] . "' />";
                                echo "<button type='submit' name='delete'>Delete</button>";
                                echo "</form></td>";
                                
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "No notices found.";
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
