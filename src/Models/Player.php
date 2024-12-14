<?php

namespace App\Models;
use App\Db\Database;
use PDO;

class Player
{
    // Properties
    public $id;
    public $position;
    public $name;
    public $jersey;
    public $value;
    public $club_id;
    public $is_foreign;

    // Constructor
    public function __construct($id, $position, $name, $jersey, $value, $club_id, $is_foreign)
    {
        $this->id = $id;
        $this->position = $position;
        $this->name = $name;
        $this->jersey = $jersey;
        $this->value = $value;
        $this->club_id = $club_id;
        $this->is_foreign = $is_foreign;
    }

    // Method to display the value with Euro formatting
    public function getFormattedValue()
    {
        return "€" . number_format($this->value, 0, '.', ',');
    }

    public static function getPlayerById($id)
    {
        $connection = Database::getConnection();  // Get PDO connection
        try {
            // Query to fetch player from the database
            $query = "SELECT * FROM players WHERE id = :id";
            $stmt = $connection->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            // Fetch the player data
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new self(
                    $row['id'],
                    $row['position'],
                    $row['name'],
                    $row['jersey'],
                    $row['value'],
                    $row['club_id'],
                    $row['is_foreign']
                );
            } else {
                return null;  // Return null if the player is not found
            }
        } catch (\PDOException $err) {
            // Handle the database error (you can log the error if needed)
            error_log("Database error: " . $err->getMessage());
            return null;
        }
    }

    public static function getPlayerValueById($id){
        $playerObj = Player::getPlayerById($id);
        return $playerObj->value;
    }

    public static function getAllPlayers()
    {
        $connection = Database::getConnection();  // Get PDO connection
        try {
            // Query to fetch all players from the database
            $query = "SELECT * FROM players";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            // Fetch all the players as an associative array
            $players = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $players[] = new self(
                    $row['id'],
                    $row['position'],
                    $row['name'],
                    $row['jersey'],
                    $row['value'],
                    $row['club_id'],
                    $row['is_foreign']
                );
            }
            return $players;
        } catch (\PDOException $err) {
            // Handle the database error (you can log the error if needed)
            error_log("Database error: " . $err->getMessage());
            return [];  // Return an empty array in case of error
        }
    }

    public static function getOurPlayers()
    {
        $connection = Database::getConnection();  // Get PDO connection
        try {
            // Query to fetch all players from the database
            $query = "SELECT * FROM players WHERE club_id=1";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            // Fetch all the players as an associative array
            $players = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $players[] = new self(
                    $row['id'],
                    $row['position'],
                    $row['name'],
                    $row['jersey'],
                    $row['value'],
                    $row['club_id'],
                    $row['is_foreign']
                );
            }
            return $players;
        } catch (\PDOException $err) {
            // Handle the database error (you can log the error if needed)
            error_log("Database error: " . $err->getMessage());
            return [];  // Return an empty array in case of error
        }
    }

    public static function getForeignPlayers()
    {
        $connection = Database::getConnection();  // Get PDO connection
        try {
            // Query to fetch all players from the database
            $query = "SELECT * FROM players WHERE is_foreign=TRUE";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            // Fetch all the players as an associative array
            $players = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $players[] = new self(
                    $row['id'],
                    $row['position'],
                    $row['name'],
                    $row['jersey'],
                    $row['value'],
                    $row['club_id'],
                    $row['is_foreign']
                );
            }
            return $players;
        } catch (\PDOException $err) {
            // Handle the database error (you can log the error if needed)
            error_log("Database error: " . $err->getMessage());
            return [];  // Return an empty array in case of error
        }
    }

    public static function moveFromSquad(array $sell, array $buy)
    {
    $connection = Database::getConnection(); // Get PDO connection

    try {
        // Process sell transactions
        foreach ($sell as $transaction) {
            if (count($transaction) !== 2) {
                throw new Exception("Invalid sell transaction data: " . json_encode($transaction));
            }

            [$playerId, $clubId] = $transaction;

            $query = "UPDATE Players SET is_foreign = TRUE, club_id = :clubId WHERE id = :id";
            $stmt = $connection->prepare($query);
            $stmt->bindValue(":id", $playerId, PDO::PARAM_INT);
            $stmt->bindValue(":clubId", $clubId, PDO::PARAM_INT);
            $stmt->execute();
        }

        // Process buy transactions
        foreach ($buy as $playerId) {
            $query = "UPDATE Players SET is_foreign = FALSE, club_id = 1 WHERE id = :id";
            $stmt = $connection->prepare($query);
            $stmt->bindValue(":id", $playerId, PDO::PARAM_INT);
            $stmt->execute();
        }
    } catch (PDOException $err) {
        // Handle database errors
        error_log("Database error: " . $err->getMessage());
        return ['status' => 'error', 'message' => $err->getMessage()];
    } catch (Exception $err) {
        // Handle logical errors
        error_log("Application error: " . $err->getMessage());
        return ['status' => 'error', 'message' => $err->getMessage()];
    }

    return ['status' => 'success', 'message' => 'Transactions processed successfully'];
}

}
