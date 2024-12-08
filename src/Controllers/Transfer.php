<?php
namespace App\Controllers;

use App\View;
use App\Models\Player;
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

        // Pass the player object to the view
        View::render('Transfer/index', [
            'title' => 'Transfer Simulation',
            'ourplayers' => $ourplayer,
            'foreignplayers' => $foreignplayer,
            'error' => ''
        ]);
    }
}
?>
