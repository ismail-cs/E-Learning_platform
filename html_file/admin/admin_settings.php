


<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                            <li><a href="admin_Instructors.php"><i class="fa-solid fa-gear"></i> Instructors</a></li>
                            <li  class="active"><a href="admin_settings.php"><i class="fa-solid fa-gear"></i> Settings</a></li>
                            
                            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout </a> </li>
                            
                        </ul>
                    </div>
                </div>
                
                
                <div class="right">

                    <div class="name">
                        <h1>Welcome <?php echo $_SESSION['user_name'] ?>  </h1>
                    </div>


                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "e_learning"; // Replace with your actual database name

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Select data from the database table
                        $sql = "SELECT * FROM Ballance"; // Replace with your actual table name
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            

                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<p style='font-size: 24px;'>Total Sale:  <span style='font-size: 24px;'>" . $row["amount"] . "</span> <span style='font-size: 24px;'> Taka </span> </p>";


                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }

                        $conn->close();
                    ?>



                    <hr>

                    <h2>Course Sale</h2>

                    <canvas id="courseSalesChart" width="400" height="150"></canvas>
                    
                    <script>
                        // Fetch data from PHP
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

                            // Select data from the database table
                            $sql = "SELECT course_name, course_sale FROM course2";
                            $result = $conn->query($sql);

                            $courseNames = [];
                            $courseSales = [];
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $courseNames[] = $row["course_name"];
                                    $courseSales[] = $row["course_sale"];
                                }
                            }

                            $conn->close();
                        ?>

                        // JavaScript to handle chart creation
                        var courseNames = <?php echo json_encode($courseNames); ?>;
                        var courseSales = <?php echo json_encode($courseSales); ?>;

                        var ctx = document.getElementById('courseSalesChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: courseNames,
                                datasets: [{
                                    label: 'Course Sales',
                                    data: courseSales,
                                    backgroundColor: 'rgba(235, 127, 54, 0.5)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                        

                 

                    


               
                </div>
            </div>
        </section>
    
</body>
</html>