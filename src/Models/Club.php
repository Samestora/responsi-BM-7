<?php

namespace App\Models;
use App\Db\Database;
use PDO;

class Club
{
    // Properties
    public $id;
    public $name;
    public $origin;

    // Constructor
    public function __construct($id, $name, $origin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->origin = $origin;
    }

    public static function getOtherClubs()
    {
        $connection = Database::getConnection();  // Get PDO connection
        try {   
            $query = "SELECT * FROM Clubs WHERE id!=1";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $clubs = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $clubs[] = new self(
                    $row['id'],
                    $row['name'],
                    $row['origin']
                );
            }
            return $clubs;
        } catch (\PDOException $err) {
            // Handle the database error (you can log the error if needed)
            error_log("Database error: " . $err->getMessage());
            return [];  // Return an empty array in case of error
        }
    }
}
?>