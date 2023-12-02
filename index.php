<?php	
	session_start();
	echo $_SESSION['user_name']
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
    </style>



</head>
<body>

    <div class = "Section1">
        <div class = "navbar"> 
            <div class = "icon"> 
                <a href="index.html"><img src="DevWiz-logo/vector/default-monochrome.svg" class="logo"></a>      
            </div>
        </div>
        <div class = "menu-bar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a>
                <li><a href="#">Categories_List</a>
                
                    <div class="sub-catagories">
                        <ul>
                            <li><a href="#">C++</a></li>
                            <li><a href="#">C#</a></li>
                            <li><a href="#">PHP</a></li>
                        </ul>
                    </div> 
                
                </li>
            </ul>
        </div>

        
        <div class="search">
            <input class="srch" type="search" name="" placeholder="Type to text">
            <a href="#"><button class="btn">Search</button></a>
        </div>

        <div class="cart">
            <ul>
                <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></i></a></li>
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
    
    
    







<div class="course_info">

    <h2>Courses</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e_learning";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Course Name</th><th>Cover Photo</th><th>Description</th><th>Price</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";

            echo "<td>" . $row['course_name'] . "</td>";
            echo "<td><img src='" . $row['course_cover_photo'] . "' alt='Cover Photo' style='max-width: 200px;'></td>";
            echo "<td>" . $row['course_description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";

            // Add Purchase button for each row
            echo "<td>";
            echo "<form method='post' action='purchase_course.php'>";
            echo "<input type='hidden' name='course_id' value='" . $row['course_id'] . "' />";
            echo "<button type='submit' name='purchase'>Purchase</button>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No courses found.";
    }

    $conn->close();
    ?>                    
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
 
