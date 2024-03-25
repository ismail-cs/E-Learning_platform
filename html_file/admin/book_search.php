<?php





include("db_conn.php");
if(isset($_POST['input'])){
    
    $input = $_POST['input'];

    $query = "SELECT * FROM library WHERE book_name LIKE '{$input}%'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){ ?>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th> Book Name </th>
                    <th> Author </th>
                    <th> Description </th>
                    <th> PDF </th>
                </tr>
            </thead>

            <tbody>
                <?php

                    while($row = mysqli_fetch_assoc($result)){

                        $book_name = $row['book_name'];
                        $author = $row['author'];
                        $description = $row['description'];
                        $upload_pdf = $row['upload_pdf'];

                        ?>

                        <tr>
                            <td> <?php echo $book_name;?> </td>
                            <td> <?php echo $author;?> </td>
                            <td> <?php echo $description;?> </td>
                            <td><a href="<?php echo $upload_pdf; ?>" target="_blank" class="pdf-link">View PDF</a></td>
                        </tr>

                        <?php

                    }

                    ?> 

            </tbody>

        </table>

        <?php
        
    }else{
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }

}



?>

