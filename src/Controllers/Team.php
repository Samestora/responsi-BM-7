<?php
namespace App\Controllers;

use App\View;
use App\Db\Database;
use App\Models\Player;

class Team{
    public function index()
    {
        $ourplayer = Player::getOurPlayers();
        
        // Pass the players data to the view
        View::render('Team/index', ["title" => "Team",'players' => $ourplayer]);
    }
}
?>
