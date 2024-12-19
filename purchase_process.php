<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Purchase Process</title>
    <link rel="stylesheet" href="css_file/style_for_home_page.css"> <!-- Link to your external CSS file -->
   
    
    
    <style>

        

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
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
    </div>


    <?php
    // Start the session
    session_start();

    // Check if all necessary POST data is set
    if (isset($_POST['course_name'], $_POST['price'], $_POST['course_id'])) {
        $course_id = $_POST['course_id'];
        $course_name = $_POST['course_name'];
        $price = $_POST['price'];

        // Store variables in session global variables
        $_SESSION['course_id'] = $course_id;
        $_SESSION['course_name'] = $course_name;
        $_SESSION['price'] = $price;

        //echo "Course ID: " . $_SESSION['course_id'];
        // Display other variables as needed
    }


    ?>

    <form action="purchase_process.php" method="post">
        <!-- Your existing form fields -->
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="transaction_id">Transaction ID:</label>
        <input type="text" id="transaction_id" name="transaction_id" required>

        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <!-- Hidden fields to pass course_name and price to process_purchase.php -->
        
        
        <button type='submit'>Submit</button>
    </form>



    <?php
// Start the session

// Check if all necessary POST data and session variables are set
if ( isset($_POST['phone_number'], $_POST['transaction_id'], $_POST['name']) && isset($_SESSION['course_name'], $_SESSION['price'], $_SESSION['course_id']) ) {
    
    $servername = "db";
    $username = "ismail";
    $password = "password1";
    $dbname = "e_learning";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve session variables
    $course_id = $_SESSION['course_id'];
    $course_name = $_SESSION['course_name'];
    $price = $_SESSION['price'];

    // Retrieve form data
    $phone_number = $_POST['phone_number'];
    $transaction_id = $_POST['transaction_id'];
    $customer_name = $_POST['name'];

    // Prepare and execute SQL query to insert data into the table
    $sql =  "INSERT INTO purchase_history (course_name, course_id, course_price, phone_number, transaction_id, customer_name)
    VALUES ('$course_name', '$course_id', '$price', '$phone_number', '$transaction_id', '$customer_name');";

    $sql .= "INSERT INTO purchase_history2 (course_name, course_id, course_price, phone_number, transaction_id, customer_name)
    VALUES ('$course_name', '$course_id', '$price', '$phone_number', '$transaction_id', '$customer_name');";

    if ($conn->multi_query($sql) === TRUE) {
        echo "Thank You, Please wait for confirmation";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
} 
?>



    
</body>
</html>