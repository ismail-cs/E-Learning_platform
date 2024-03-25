<?php	
	session_start();
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <link rel="stylesheet" href="css_file/style_for_home_page.css"> <!-- Link to your external CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> 
    
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .notice-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            float: right;
            margin-right: 30px;
            margin-top: 30px;
        }

        .course_info{

            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            float: left;
            margin-left: 30px;
            margin-top: 30px;

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

        img {
            max-width: 200px;
            max-height: 200px;
        }



        .course-container {
                    max-width: 800px;
                    margin: 20px auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
                    float: right;
                    margin-left: 30px;
                    margin-right: 30px;
                    margin-top: 30px;
                }


        .course_info {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        .blocks-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px; /* Gap between blocks */
        }

        .course-block {
            border: 1px solid #ccc;
            padding: 10px;
            width: calc(33.33% - 20px); /* Adjust width for three blocks per row with gap */
            box-sizing: border-box;
            margin-bottom: 20px; /* Space between rows */
        }

        .course-block img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .course-block img:hover {
            transform: scale(1.1);
        }






    </style>



</head>
<body>

    <div class = "Section1">
        <div class = "navbar"> 
            <div class = "icon"> 
                <a href="index.php"><img src="DevWiz-logo/vector/default-monochrome.svg" class="logo"></a>      
            </div>
        </div>
        <div class = "menu-bar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a>
            </ul>
        </div>

        
        
        
        <div class="theme">
            <!-- For theam -->
        </div>
        <div class="login">
            <a href="admin_login.php" class="login-btn">Login</a>
            <a href="html_file/ragistration_page.php" class="signup-btn">Signup</a>
        </div>
    </div>
    
    










    <div class="course-container">
        <h1>Course List</h1>
        <div class="blocks-container">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "e_learning";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT c.id, c.course_name, ct.category_name AS course_type, i.name AS instructor, c.cover_photo, c.price, c.course_description
                    FROM course2 c
                    INNER JOIN categories ct ON c.course_type = ct.id
                    INNER JOIN Instructors i ON c.instructor = i.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='course-block'>
                            <img src='html_file/admin/" . $row["cover_photo"] . "'>
                            <h3>" . $row["course_name"] . "</h3>
                            <p>Instructor: " . $row["instructor"] . "</p>
                            <p>Price: " . $row["price"] . "</p>
                            <p>Description: " . $row["course_description"] . "</p>

                            <form action='purchase.php' method='post'> 
                                <input type='hidden' name='course_id' value='" . $row["id"] . "'>
                                <button type='submit'>Purchase</button>
                            </form>

                        </div>";
                }
            } else {
                echo "<p>No courses found</p>";
            }

            $conn->close();
        ?>
        </div>
    </div>






    <div class="notice-container">
        <h2>Notice Board</h2>


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

        // Fetch data from the notices table
        $sql = "SELECT * FROM notices";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display data in a table
            echo "<table border='1'>";
            echo "<tr><th>Notice Name</th><th>Date</th><th>Description</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['noticename'] . "</td>";
                echo "<td>" . $row['date_op'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
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








    
    
</body>
</html>
 
