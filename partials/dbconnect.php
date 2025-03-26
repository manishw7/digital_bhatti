<?php
    $server = '127.0.0.1';
    $username = 'root';
    $password = '';
    $db_name = 'digitalbhatti';

    $conn = mysqli_connect($server,$username,$password,$db_name);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    // $sql = "Select * from users where username='manish'";
    // $bhanai = mysqli_query($conn,$sql);
    // if(mysqli_num_rows($bhanai) > 0){
    //     // Fetch and display each row
    //     while($row = mysqli_fetch_assoc($bhanai)){
    //         echo "Username: " . $row['username'] . "<br>";
    //         echo "Password: " . $row['password'] . "<br>"; // Example, change as per your table columns
    //     }
    // } else {
    //     echo 'No result';
    // }
?>