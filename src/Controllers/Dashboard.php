<?php

namespace App\Controllers;

use App\View;
use App\Models\Account;
use App\Middleware\AuthMiddleware;

class Dashboard
{

    function index(): void
    {
        $Auth = new AuthMiddleware();
        $Auth->before();
        
        $account = new Account(
            $_SESSION['logged_in']['id'],
            $_SESSION['logged_in']['role_id'],
            $_SESSION['logged_in']['name'],
            $_SESSION['logged_in']['email'],
            []
        );

        View::render('Dashboard/index', ['title' => 'Dashboard', "account" => $account]);
    }

    public function update(): void
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collecting input data
            $id = $_SESSION['logged_in']['id'];
            $password = trim($_POST['password']);
            $password_retyped = trim($_POST['password-retyped']);
            $newname = trim($_POST['new-name']);
            $newemail = trim($_POST['new-email']);
            $newpassword = trim($_POST['new-password']);

            // Fetch the account for the logged-in user
            $account = Account::getAccountById($id);

            if ($account && password_verify($password, $account->password)) {
                if ($password === $password_retyped) {
                    // Hash the new password if provided
                    $updatedPassword = $newpassword ? password_hash($newpassword, PASSWORD_BCRYPT) : $account->password;

                    // Update the account
                    $updated = Account::updateAccount($id, $newname ?: $account->name, $newemail ?: $account->email, $updatedPassword);

                    if ($updated) {
                        // Update session variables for the logged-in user
                        $_SESSION['logged_in']['name'] = $newname ?: $account->name;
                        $_SESSION['logged_in']['email'] = $newemail ?: $account->email;

                        // Redirect to dashboard or homepage
                        header('Location: /dashboard');
                        exit();
                    } else {
                        View::render('Dashboard/index', [
                            "title" => 'Error',
                            'error' => "Failed to update account."
                        ]);
                    }
                } else {
                    View::render('Dashboard/index', [
                        "title" => 'Error',
                        'error' => "Passwords do not match."
                    ]);
                }
            } else {
                View::render('Dashboard/index', [
                    "title" => 'Error',
                    'error' => "Current password is incorrect."
                ]);
            }
        } else {
            View::render('Dashboard/index', [
                "title" => 'Dashboard',
                'error' => "Only POST method is allowed."
            ]);
        }
    }
}