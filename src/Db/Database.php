<?php
namespace App\Db;

use PDO;
use PDOException;
use App\Utils\Dotenv;


class Database
{
    private static $connection = null;

    public static function getConnection()
    {
        $env = new Dotenv(__DIR__ . '/../../.env');
        $env->load();

        if (self::$connection === null) {
            $host = getenv('APP_HOST')?: 'localhost';
            $port = getenv('APP_PORT')?: '3306';
            $username = getenv('MYSQL_USER')?: 'root'; 
            $password = getenv('MYSQL_PASSWORD')?: ''; 
            $dbname = getenv('MYSQL_DATABASE')?:'Bayern';     

            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$dbname;port=$port;", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $err) {
                error_log($err->getMessage(), 3, 'logfile.log');
                die("Database connection failed.");
            }
        }
        return self::$connection;
    }
}
?>
