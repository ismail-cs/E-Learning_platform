

<?php   
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    
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
    /* CSS for the data table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f2f2f2;
    }

    .approve-btn, .discard-btn {
        padding: 8px 12px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        color: white;
        font-weight: bold;
    }

    .approve-btn {
        background-color: #4CAF50;
    }

    .discard-btn {
        background-color: #f44336;
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
                            <li  class="active"><a href="admin_Content.php"><i class="fa fa-heart-o"></i> Content</a></li>
                            <li><a href="admin_Blog.php"><i class="fa-solid fa-cart-shopping"></i> Notice</a></li>
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
                        <h3>Content</h3>

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

                            // Handle Approve and Discard actions
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (isset($_POST['action']) && isset($_POST['purchase_id'])) {
                                    $purchase_id = $_POST['purchase_id'];
                                    $action = $_POST['action'];

                                    if ($action === 'approve') {
                                        // Get course_price and course_id
                                        $sql = "SELECT course_price, course_id FROM purchase_history2 WHERE purchase_id = $purchase_id";
                                        $result = $conn->query($sql);
                                        
                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $course_price = $row['course_price'];
                                            $course_id = $row['course_id'];
                                    
                                            // Update Balance table
                                            $updateBalanceSql = "UPDATE Ballance SET amount = amount + $course_price WHERE ballance_id = 1";
                                            $conn->query($updateBalanceSql);
                                    
                                            // Update course2 table course_sale count
                                            $updateCourseSaleSql = "UPDATE course2 SET course_sale = course_sale + 1 WHERE id = $course_id";
                                            $conn->query($updateCourseSaleSql);
                                        }
                                    
                                        // Delete from purchase_history2
                                        $deleteSql = "DELETE FROM purchase_history2 WHERE purchase_id = $purchase_id";
                                        $conn->query($deleteSql);
                                    }
                                    elseif ($action === 'discard') {
                                        // Delete from purchase_history2
                                        $deleteSql = "DELETE FROM purchase_history2 WHERE purchase_id = $purchase_id";
                                        $conn->query($deleteSql);
                                    }
                                }
                            }

                            // Select data from the database table
                            $sql = "SELECT purchase_id, course_name, course_id, course_price, phone_number, transaction_id, customer_name FROM purchase_history2";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1'>
                                <tr>
                                    
                                    <th>Course Name</th>
                                    
                                    <th>Course Price</th>
                                    <th>Phone Number</th>
                                    <th>Transaction ID</th>
                                    <th>Customer Name</th>
                                    <th>Approve</th>
                                    <th>Discard</th>
                                </tr>";

                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                    
                                    <td>" . $row["course_name"] . "</td>
                                    
                                    <td>" . $row["course_price"] . "</td>
                                    <td>" . $row["phone_number"] . "</td>
                                    <td>" . $row["transaction_id"] . "</td>
                                    <td>" . $row["customer_name"] . "</td>
                                    <td><form method='post' action=''><input type='hidden' name='action' value='approve'><input type='hidden' name='purchase_id' value='" . $row["purchase_id"] . "'><button type='submit'>Approve</button></form></td>
                                    <td><form method='post' action=''><input type='hidden' name='action' value='discard'><input type='hidden' name='purchase_id' value='" . $row["purchase_id"] . "'><button type='submit'>Discard</button></form></td>
                                    </tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }

                            $conn->close();
                        ?>





                    </div>

                    
                    
                </div>
            </div>

        </section>
    
</body>
</html>