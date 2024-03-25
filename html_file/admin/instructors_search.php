<?php


include("db_conn.php");
if(isset($_POST['input'])){
    
    $input = $_POST['input'];

    $query = "SELECT * FROM Instructors WHERE name LIKE '{$input}%'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){ ?>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Dob </th>
                    <th> Bio </th>
                </tr>
            </thead>

            <tbody>
                <?php

                    while($row = mysqli_fetch_assoc($result)){

                        $name = $row['name'];
                        $email = $row['email'];
                        $dob = $row['dob'];
                        $bio = $row['bio'];

                        ?>

                        <tr>
                            <td> <?php echo $name;?> </td>
                            <td> <?php echo $email;?> </td>
                            <td> <?php echo $dob;?> </td>
                            <td> <?php echo $bio;?> </td>
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

