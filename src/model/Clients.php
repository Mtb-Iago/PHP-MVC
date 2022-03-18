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
            $res = $pdo->query("SELECT * FROM clients
             WHERE id = $id ");

            $return_data = $res->fetch();
            return $return_data;
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
            $res = $pdo->query("SELECT * FROM clients ORDER BY id desc ");

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
            
            $res = $pdo->prepare("INSERT into clients ( name, password, email, phone, city, state) values
                                                    (:name, :password, :email, :phone, :city, :state) ");

            $res->bindValue(':name', $params['nome']);
            $res->bindValue(':password', $params['password']);
            $res->bindValue(':email', $params['email']);
            $res->bindValue(':phone', $params['phone']);
            $res->bindValue(':city', $params['city']);
            $res->bindValue(':state', $params['state']);
            $res->execute();
           
        return json_encode([["status" => true, "msg" => "gravado com sucesso"]]);
            
        }
        catch (\Throwable $th) {
            return json_encode([["status" => false, "error" => "catch", "data" => $th]]);
        }

    }
    public function update(array $params, int $id)
    {
        $connection = new Conn();
        $pdo = $connection->connection();

        try {
            $res = $pdo->prepare("UPDATE clients SET name = :name, email = :email, phone = :phone,
                                        city = :city, state = :state WHERE id = :id ");

            $res->bindValue(':name', $params['nome']);
            $res->bindValue(':email', $params['email']);
            $res->bindValue(':phone', $params['phone']);
            $res->bindValue(':city', $params['city']);
            $res->bindValue(':state', $params['state']);

            $res->bindValue(':id', $params['id']);

            $res->execute();

            return json_encode([["status" => true, "msg: " => "Editado com sucesso"]]);
        } catch (\Throwable $th) {
            return json_encode([["status" => false, "error" => "catch", "data" => $th]]);
        }

    }
    
    
    public function delete(int $id)
    {
        $connection = new Conn();
        $pdo = $connection->connection();

        try {
            $res = $pdo->query("DELETE FROM clients WHERE id = '$id' ");

            return true;
        }
        catch (\Throwable $th) {
            return json_encode([["status" => false]]);
        }
    }
}