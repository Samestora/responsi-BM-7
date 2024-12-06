<?php

namespace App\Models;
use App\Db\Database;
use App\Utils\UUID;
use PDO;

class Account
{
    // Properties
    public $id;
    public $role_id;
    public $name;
    public $email;
    public $password;

    // Constructor
    public function __construct($id, $role_id, $name, $email, $password)
    {
        $this->id = $id;
        $this->role_id = $role_id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function getRoleName()
    {
        $connection = Database::getConnection();  // Get PDO connection
        try {
            // Query to fetch the role name from the roles table using role_id
            $query = "SELECT name FROM roles WHERE id=:role_id";
            $stmt = $connection->prepare($query);
            $stmt->bindValue(":role_id", $this->role_id, PDO::PARAM_INT);  // Assuming role_id is an integer
            $stmt->execute();

            // Fetch the role name
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($row) {
                return $row['name'];  // Return the role name
            } else {
                return 'Unknown Role';  // If no role found, return a default value
            }
        } catch (\PDOException $err) {
            // Log the error and return a message
            error_log("Database error: " . $err->getMessage());
            return 'Error fetching role';  // Return a default error message
        }
    }

    public static function getAccountById($id)
    {
        $connection = Database::getConnection();
        $query = "SELECT * FROM Accounts WHERE id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? new self($row['id'], $row['role_id'], $row['name'], $row['email'], $row['password']) : null;
    }


     // Method to fetch account details by email or username
     public static function getAccountByCredentials($creds, $password)
     {
         $connection = Database::getConnection();  // Get PDO connection
         try {
             // Query to fetch the account based on username/email
             $query = "SELECT * FROM Accounts WHERE (name = :creds OR email = :creds)";
             $stmt = $connection->prepare($query);
             $stmt->bindValue(":creds", $creds, PDO::PARAM_STR);
             $stmt->execute();
     
             // Fetch the account details
             $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
             if ($row && isset($row['password'])) {
                 // Verify the password using password_verify
                 if (password_verify($password, $row['password'])) {
                     return new self($row['id'], $row['role_id'], $row['name'], $row['email'], $row['password']);
                 } else {
                     // Password does not match
                     return null;
                 }
             }
     
             // No matching account found
             return null;
         } catch (\PDOException $err) {
             // Log the error and return null
             error_log("Database error: " . $err->getMessage());
             return null;
         }
     }
     

    public static function deleteAccount($id, $password)
    {
        $connection = Database::getConnection();  // Get PDO connection
        try {
        $query = "DELETE FROM Accounts WHERE id=:id AND password=:password";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();

        return true;
        } catch (\PDOException $err) {
            // Log the error and return null
            echo("Database error: " . $err->getMessage());
            return false;
        }
    }

    public static function createAccount($username,$email,$role_id, $password)
    {
        $account = new self(UUID::generate(), $role_id, $username,$email, $password);
        $connection = Database::getConnection();
        $query = "INSERT INTO Accounts (id, name, email, role_id, password) VALUES (:id, :name, :email, :role_id, :password)";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(":id", $account->id, PDO::PARAM_STR);
        $stmt->bindValue(":role_id", $account->role_id, PDO::PARAM_INT);
        $stmt->bindValue(":name", $account->name, PDO::PARAM_STR);
        $stmt->bindValue(":email", $account->email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $account->password, PDO::PARAM_STR);
        $stmt->execute();

        return $account;
    }

public static function updateAccount($id, $name, $email, $password)
    {
        $connection = Database::getConnection();
        $query = "UPDATE Accounts SET name = :name, email = :email, password = :password WHERE id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);

        return $stmt->execute();
    }

}
