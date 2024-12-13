<?php

namespace App\Models;
use App\Db\Database;
use App\Models\Player;
use PDO;

class Revenue
{
    // Properties
    public $id;
    public $balance;

    // Constructor
    public function __construct($id, $balance)
    {
        $this->id = $id;
        $this->balance = $balance;
    }

    public static function getCurrentRevenue(){
        $connection = Database::getConnection();  // Get PDO connection
        try {
            // Query to fetch player from the database
            $query = "SELECT * FROM funds WHERE id = 1";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            // Fetch the player data
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return $row['balance'];
            } else {
                return null;  // Return null if the player is not found
            }
        } catch (\PDOException $err) {
            // Handle the database error (you can log the error if needed)
            error_log("Database error: " . $err->getMessage());
            return null;
        }
    }

    public static function calculateRevenueFromtransactions($sell, $buy){
        $plus = 0;
        $loss = 0;

        foreach ($sell as $transaction) {
            [$playerId, $clubId] = $transaction;
            $plus += Player::getPlayerValueById($playerId);
        }

        foreach ($buy as $foreign_id) {
            $loss -= Player::getPlayerValueById($foreign_id);
        }
        
        return ($plus+$loss);
    }

    public static function addCurrentRevenue($addition){
        $connection = Database::getConnection();
        $currentRevenue = self::getCurrentRevenue();
        $addition += $currentRevenue;
        try {
            $query = "UPDATE funds set balance=:addition WHERE id = 1";
            $stmt = $connection->prepare($query);
            $stmt->bindValue(":addition", $addition, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return getCurrentRevenue($id);
            } else {
                return null;
            }
        } catch (\PDOException $err) {
            error_log("Database error: " . $err->getMessage());
            return null;
        }
    }
}
?>