<?php
namespace src\models\Clients;

use src\config\connection\Connection as Conn;

class Clients
{
    public function __construct()
    {
        $this->connection = new Conn();
    }
    public function selectOne(int $id)
    {
        try {
            
            $pdo = $this->connection->connection();
            $res = $pdo->query("SELECT * FROM users
             WHERE id = $id ");

            $return_data = $res->fetch();
            return json_encode($return_data, true);
        }
        catch (\Throwable $th) {
        //throw $th;
        }

    }
    public function selectAll()
    {
        try {
            $connection = new Conn();
            $pdo = $connection->connection();
            $res = $pdo->query("SELECT * FROM users ORDER BY id desc ");

            $return_data = $res->fetchAll(\PDO::FETCH_ASSOC);
            return $return_data;
        // return json_encode($return_data, true);
        }
        catch (\Throwable $th) {
            var_dump($th);
            return json_encode(["status" => false, "error" => $th]);
        }

    }
    public function create(array $params, array $files = null)
    {
        try {
            $connection = new Conn();
            $pdo = $connection->connection();

            
           
                return json_encode([["status" => false, "error" => "bottom"]]);
            
        }
        catch (\Throwable $th) {
            return json_encode([["status" => false, "error" => "catch", "data" => $th]]);
        }

    }
    public function update(array $params, array $files = null)
    {
        $connection = new Conn();
        $pdo = $connection->connection();

        
            return json_encode([["status" => false, "Erro: " => "Error"]]);
        

    }
    
    
    public function delete(int $id)
    {
        $connection = new Conn();
        $pdo = $connection->connection();

        try {
            $res = $pdo->query("DELETE FROM users WHERE id = '$id' ");

            return true;
        }
        catch (\Throwable $th) {
            return json_encode([["status" => false]]);
        }
    }
}