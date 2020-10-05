<?php


class User extends DbConnections
{

    public function create($data)
    {
        $pdo = $this->connect();
        $query = $pdo->prepare('INSERT INTO users SET email=:email, name=:name, created_at=:created_at, updated_at=:updated_at');
        $timestamp = date('Y-m-d H:i:s');

         $query->execute([
            ':email' => $data['email'],
            ':name' => $data['name'],
            ':created_at' => $timestamp,
            ':updated_at' => $timestamp,
        ]);

         return $pdo->lastInsertId();
    }

    public function getUsersApi()
    {
        $users = Api::getApiData('users');
        $this->importUsers($users);
    }

    protected function importUsers($users)
    {

        $filterData = array_map(function ($val) {
            return [
                'name' => $val->name,
                'email' => $val->email,
            ];
        }, $users);

        $query = $this->connect()->prepare('INSERT INTO users SET email=:email, name=:name, created_at=:created_at, updated_at=:updated_at');

        foreach ($filterData as $data) {

            $timestamp = date('Y-m-d H:i:s');
            $query->execute([
                ':email' => $data['email'],
                ':name' => $data['name'],
                ':created_at' => $timestamp,
                ':updated_at' => $timestamp,
            ]);

        }

    }

}