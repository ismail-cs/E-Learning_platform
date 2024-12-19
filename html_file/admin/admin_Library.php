
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
  <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <style>
    

        h2 {
        text-align: center;
        color: #333;
        }

        form {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
        font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border-radius: 4px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        textarea {
        resize: vertical;
        height: 100px;
        }

        input[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        }

        input[type="submit"]:hover {
        background-color: #45a049;
        }




        .book-container {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .book-container img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .book-container a {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            background-color: #4caf50;
            border-radius: 4px;
        }

        .book-container a:hover {
            background-color: #45a049;
        }







        /* book search */


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


        /* CSS for the green box link */
        .pdf-link {
            display: inline-block;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .pdf-link:hover {
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
                            <li><a href="admin_Blog.php"><i class="fa-solid fa-cart-shopping"></i> Notice </a></li>
                            <li  class="active"><a href="admin_Library.php"><i class="fa-solid fa-gear"></i> Library</a></li>
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





                    <div class="container" style="max-width: 50%;">
                        <div class="text-center mt-5 mb-4">
                            <h2>Book Search</h2>
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
                                        url: "book_search.php",
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

                    <section id="page-title">
                        <h3>Library</h3>
                        <h2>Upload PDF Book to Library</h2>
                          <form action="admin_Library.php" method="post" enctype="multipart/form-data">
                            <label for="bookName">Book Name:</label><br>
                            <input type="text" id="bookName" name="bookName"><br><br>
                            
                            <label for="coverPhoto">Cover Photo:</label><br>
                            <input type="file" id="coverPhoto" name="coverPhoto"><br><br>
                            
                            <label for="author">Author:</label><br>
                            <input type="text" id="author" name="author"><br><br>
                            
                            <label for="description">Description:</label><br>
                            <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
                            
                            <label for="pdfFile">Upload PDF:</label><br>
                            <input type="file" id="pdfFile" name="pdfFile"><br><br>
                            
                            <input type="submit" value="Upload Book">
                          </form>
                        




<hr>



<?php
    // Database connection parameters
    $servername = "db"; // Replace with your server name
    $username = "ismail"; // Replace with your database username
    $password = "password1"; // Replace with your database password
    $dbname = "e_learning"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle file uploads
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bookName = $_POST['bookName'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        
        // Handle cover photo upload
        $coverPhoto = $_FILES['coverPhoto']['name'];
        $coverPhotoTemp = $_FILES['coverPhoto']['tmp_name'];
        $coverPhotoNewName = uniqid() . "_" . $coverPhoto; // Generating a unique name for the cover photo
        $coverPhotoDestination = 'cover_photos/' . $coverPhotoNewName;
        move_uploaded_file($coverPhotoTemp, $coverPhotoDestination);

        // Handle PDF file upload
        $pdfFile = $_FILES['pdfFile']['name'];
        $pdfFileTemp = $_FILES['pdfFile']['tmp_name'];
        $pdfFileNewName = uniqid() . "_" . $pdfFile; // Generating a unique name for the PDF file
        $pdfFileDestination = 'books/' . $pdfFileNewName;
        move_uploaded_file($pdfFileTemp, $pdfFileDestination);

        // Insert data into database
        $sql = "INSERT INTO library (book_name, cover_photo, author, description, upload_pdf)
        VALUES ('$bookName', '$coverPhotoDestination', '$author', '$description', '$pdfFileDestination')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close database connection
    $conn->close();
?>





    <?php
        // Database connection parameters
        $servername = "db"; // Replace with your server name
        $username = "ismail"; // Replace with your database username
        $password = "password1"; // Replace with your database password
        $dbname = "e_learning"; // Replace with your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Select data from the library table
        $sql = "SELECT * FROM library";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='book-container'>";
                echo "<h2>" . $row["book_name"] . "</h2>";
                echo "<img src='" . $row["cover_photo"] . "' alt='Cover Photo'>";
                echo "<p><strong>Author:</strong> " . $row["author"] . "</p>";
                echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
                echo "<p><strong>PDF File:</strong> <a href='" . $row["upload_pdf"] . "' target='_blank'>Download PDF</a></p>";
                echo "</div>";
            }
        } else {
            echo "<p>No books found.</p>";
        }

        // Close database connection
        $conn->close();
    ?>




                    </section>                    
                </div>
            </div>

        </section>
    
</body>
</html>
