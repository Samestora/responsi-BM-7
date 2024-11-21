<?php namespace App\Db;
    use PDO;
    use PDOException;

    include(__DIR__ . '/../Dotenv.php');

    $host = getenv('HOST');
    $port = getenv('PORT');         
    $username = getenv('USERNAME'); 
    $password = getenv('PASSWORD'); 
    $dbname = getenv('DBNAME');     

    try {
        $connection = new PDO("mysql:host=$host;dbname=$dbname;port=$port;", $username, $password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
        error_log($err->getMessage(), 3, 'logfile.log');
        die("Database connection failed.");
    }
?>