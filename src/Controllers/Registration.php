<?php

namespace App\Controllers;
use App\View;
use App\Db\Database;
use App\Models\Account;
use App\Middleware\AuthMiddleware;
use PDO;

class Registration
{

    public function login()
    {
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $request = [
                "creds" => trim($_POST['creds']),
                "password" => trim($_POST['password'])
            ];
    
            // Get the database connection
            $connection = Database::getConnection();  // Get PDO connection
    
            try {
                // Query to fetch players from the database
                $query = "SELECT * FROM Accounts WHERE (name=:creds or email=:creds) AND password=:password";
                $stmt = $connection->prepare($query);
                $stmt->bindValue(":creds", $request['creds'], PDO::PARAM_STR);
                $stmt->bindValue(":password", $request['password'], PDO::PARAM_STR);
                $stmt->execute();

                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                if ($row) {
                    // Set session variables for logged-in user
                    $_SESSION['logged_in'] = [
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'role_id' => $row['role_id'],
                    ];
                    // Redirect to a dashboard or homepage
                    header('Location: /');
                    exit();
                } else {
                    View::render('login', ["title"=>'error','error' => "Invalid credentials."]);
                }
            } catch (\PDOException $err) {
                // Handle error if the database query fails
                echo $err->getMessage();
            }
        }else if($_SERVER['REQUEST_METHOD'] == 'GET'){
            View::render('login', ["title" => "Login"]);
        }
    }

    function signin(): void
    {
        $model = ["title"=>"Sign In"];
        View::render('signin', $model);
    }

    function logout(): void
    {
        $Auth = new AuthMiddleware();
        $Auth->before();
        session_destroy();
        
        $model = ["title"=>"Login"];
        View::render('login', $model);
    }
}