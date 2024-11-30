<?php
namespace App\Controllers;

use App\Controller;
use App\Db\Database;
use App\Models\Player;
use PDO;

class Transfer extends Controller
{
    public function index()
    {
        // Get the database connection
        $connection = Database::getConnection();  // Get PDO connection

        try {
            // Query to fetch players from the database
            $stmt = $connection->query("SELECT id, position, name, jersey, value, team_id, is_foreign FROM Players");
            $players = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Process each player and store it in the players array
                $player = new Player(
                    $row['id'],
                    $row['name'], 
                    $row['position'], 
                    $row['jersey'], 
                    $row['value'],
                    $row['team_id'],
                    $row['is_foreign']
                );
                // Append the player to the players array
                $players[] = $player;
            }
        
            // Pass the players data to the view
            $this->render('transfer', ['players' => $players]);        

        } catch (\PDOException $err) {
            // Handle error if the database query fails
            $this->render('transfer', ['error' => 'Failed to load data: ' . $err->getMessage()]);
        }
    }
}
?>
