<?php
    $servername = "db";
    $username = "ismail";
    $password = "password1";
    $dbname = "e_learning";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['course_id'])) {
        $course_id = $_POST['course_id'];

        $sql = "SELECT c.id, c.course_name, ct.category_name AS course_type, i.name AS instructor, c.cover_photo, c.price, c.course_description
                FROM course2 c
                INNER JOIN categories ct ON c.course_type = ct.id
                INNER JOIN Instructors i ON c.instructor = i.id
                WHERE c.id = $course_id";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Course Purchase</title>

    <style>
        

        .course-details {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            width: 100%;
            max-width: 300px;
            height: auto;
            display: block;
            margin-bottom: 15px;
        }

        h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 8px;
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

<link rel="stylesheet" href="css_file/style_for_home_page.css"> <!-- Link to your external CSS file -->
   
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

    
    <div class='course-details'>
        <img src='html_file/admin/<?php echo $row["cover_photo"]; ?>'>
        <h3><?php echo $row["course_name"]; ?></h3>
        <p>Instructor: <?php echo $row["instructor"]; ?></p>
        <p>Price: <?php echo $row["price"]; ?></p>
        <p>Description: <?php echo $row["course_description"]; ?></p>
        <form action='purchase_process.php' method='post'>
            <input type='hidden' name='course_id' value='<?php echo $row["id"]; ?>'>
            <input type='hidden' name='course_name' value='<?php echo $row["course_name"]; ?>'>
            <input type='hidden' name='price' value='<?php echo $row["price"]; ?>'>
            <button type='submit'>Purchase</button>
        </form>
    </div>
</body>
</html>

<?php
        } else {
            echo "<p>No course found</p>";
        }
    } else {
        echo "<p>Course ID not received</p>";
    }

    $conn->close();
?>
