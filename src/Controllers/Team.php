<?php
namespace App\Controllers;

use App\View;
use App\Db\Database;
use App\Models\Player;
use PDO;

class Team{
    public function index()
    {
        // Get the database connection
        $connection = Database::getConnection();  // Get PDO connection

        try {
            // Query to fetch players from the database
            $stmt = $connection->query("SELECT id, position, name, jersey, value, team_id FROM Players WHERE is_foreign=FALSE");
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
                    []
                );
                // Append the player to the players array
                $players[] = $player;
            }
        
            // Pass the players data to the view
            View::render('Team/index', ["title" => "Team",'players' => $players]);        

        } catch (\PDOException $err) {
            // Handle error if the database query fails
            View::render('Team/index', ["title"=>"Error",'error' => 'Failed to load data: ' . $err->getMessage()]);
        }
    }
}
?>
