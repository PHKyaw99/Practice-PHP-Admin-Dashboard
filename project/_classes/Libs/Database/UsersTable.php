<?php

namespace Libs\Database;

use PDOException;

class UsersTable {
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function getAll() {
        try {
            $query = "SELECT users.*, roles.name As role, roles.value FROM users LEFT JOIN roles on users.role_id = roles.id";
            $statement = $this->db->query($query);

            return $statement->fetchAll();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function insert($data) {
        try {
            $query = "INSERT INTO users (name, email, phone, address, password, role_id, created_at) VALUES (:name, :email, :phone, :address, :password, :role_id, NOW())";

            $statement = $this->db->prepare($query);
            $statement->execute($data);

            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function findByEmailAndPass($email, $password ) {
        try {
            $query = "SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles on users.role_id = roles.id WHERE users.email = :email AND users.password = :password";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "email" => $email,
                "password" => $password
            ]);
            $row = $statement->fetch();
            
            return $row ?? false;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function updatePhoto($id, $name) {
        try {
            $query = ("UPDATE users SET photo = :name WHERE id = :id");
            $statement = $this->db->prepare($query);
            $statement->execute([
                'name' => $name,
                'id' => $id,
            ]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function suspend($id) {
        try {
            $query = ("UPDATE users SET suspended = 1 WHERE id = :id");
            $statement = $this->db->prepare($query);
            $statement->execute([
                'id' => $id
            ]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function unsuspend($id) {
        try {
            $query = ("UPDATE users SET suspended = 0 WHERE id = :id");
            $statement = $this->db->prepare($query);
            $statement->execute([
                'id' => $id
            ]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function changeRole($id, $role) {
        try {
            $query = ("UPDATE users SET role_id = :role WHERE id = :id");
            $statement = $this->db->prepare($query);
            $statement->execute([
                'id' => $id,
                'role' => $role
            ]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function delete($id) {
        try {
            $query = ("DELETE FROM users WHERE id = :id");
            $statement = $this->db->prepare($query);
            $statement->execute([
                'id' => $id,
            ]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            throw $e;
        }
    }
}