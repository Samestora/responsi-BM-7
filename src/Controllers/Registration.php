<?php

namespace App\Controllers;
use App\View;
use App\Models\Account;
use App\Middleware\AuthMiddleware;

class Registration
{

    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collecting input data
            $creds = trim($_POST['creds']);
            $password = trim($_POST['password']);

            // Fetch the account using credentials
            $account = Account::getAccountByCredentials($creds, $password);

            if ($account) {
                // Set session variables for logged-in user
                $_SESSION['logged_in'] = [
                    'id' => $account->id,
                    'role_id' => $account->role_id,
                    'name' => $account->name,
                    'email' => $account->email
                ];

                // Redirect to dashboard or homepage
                header('Location: /');
                exit();
            } else {
                // If no matching user is found, show error
                View::render('login', [
                    "title" => 'Error',
                    'error' => "Invalid credentials."
                ]);
            }
        } else {
            // Render login form
            View::render('login', ["title" => "Login"]);
        }
    }

    function signin(): void
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collecting input data
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $role_id = trim($_POST['role_id']);
            $password = trim($_POST['password']);
            $password_retyped = trim($_POST['password-retyped']);

            if ($password === $password_retyped){
                // Fetch the account using credentials
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $account = Account::createAccount($name, $email, $role_id, $hashedPassword);

                if ($account) {
                    // Set session variables for logged-in user
                    $_SESSION['logged_in'] = [
                        'id' => $account->id,
                        'name' => $account->name,
                        'email' => $account->email,
                        'role_id' => $account->role_id,
                    ];

                    // Redirect to dashboard or homepage
                    header('Location: /');
                    exit();
                } else {
                    // If no matching user is found, show error
                    View::render('signin', [
                        "title" => 'Error',
                        'error' => "Invalid credentials."
                    ]);
                }
            } else {
                View::render('signin', ["title" => "Sign In"]);
            }
        }else{
            View::render('signin', [
                "title" => 'Sign In',
                'error' => "Invalid credentials."
            ]);
        }
    }

    function logout(): void
    {
        $Auth = new AuthMiddleware();
        $Auth->before();
        session_destroy();
        
        $model = ["title"=>"Login"]; // Meaningless
        View::render('login', $model);
    }

    function delete(): void
    {
        $Auth = new AuthMiddleware();
        $Auth->before();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collecting input data
            $id = trim($_POST['id']);
            $password = trim($_POST['password']);

            // Fetch the account using credentials
            $account = Account::deleteAccount($id, $password);
            if ($account) {
                session_destroy();
                header('Location: /');
                exit();
            } else {
                // If no matching user is found, show error
                View::render('login', [
                    "title" => 'Error',
                    'error' => "Invalid credentials."
                ]);
            }
        } else {
            // Render login form
            View::render('login', ["title" => "Login"]);
        }
    }
}