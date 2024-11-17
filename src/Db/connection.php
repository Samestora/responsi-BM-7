<?php namespace db;
    use PDO;
    
    $connection = mysqli_connect("localhost", "root", "", "bayern", "3306");
    if($connection -> connect_errno){
        echo "Failed to connect, check name, password, db_name and port!" . $connection -> connect_error;
        exit();
    }
?>