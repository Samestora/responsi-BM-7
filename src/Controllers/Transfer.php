<?php
namespace App\Controllers;

use App\View;
use App\Models\Player;
use App\Models\Club;
use App\Models\Revenue;
use App\Middleware\AuthMiddleware;

class Transfer{
    public function index()
    {
        // Ensure the user is authenticated
        $auth = new AuthMiddleware();
        $auth->before();

        // Fetch the player by ID
        $foreignplayer = Player::getForeignPlayers();
        $ourplayer = Player::getOurPlayers();
        $currentRevenue = Revenue::getCurrentRevenue();
        $clubLists = Club::getOtherClubs();

        // Pass the player object to the view
        View::render('Transfer/index', [
            'title' => 'Transfer Simulation',
            'clubLists' => $clubLists,
            'ourplayers' => $ourplayer,
            'foreignplayers' => $foreignplayer,
            'currentRevenue'=> $currentRevenue,
            'error' => ''
        ]);
    }

    public function update()
    {
        $auth = new AuthMiddleware();
        $auth->before();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true); // Decode JSON into an associative array
        
            if (json_last_error() === JSON_ERROR_NONE) {
                $buy = $data['buy'];
                $sell = $data['sell'];

                $revenueEarned = Revenue::calculateRevenueFromTransactions($sell, $buy);
                Revenue::addCurrentRevenue($revenueEarned);
                Player::moveFromSquad($sell, $buy);

                echo json_encode(['status' => 'success', 'message' => 'Transactions committed successfully']);
            } else {
                http_response_code(400);
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid JSON format'
                ]);
            }
        } 
        else {
            http_response_code(405);
            echo json_encode([
                'status' => 'error',
                'message' => 'POST method only allowed'
            ]);
        }
    }
}
?>
