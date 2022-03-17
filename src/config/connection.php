<?php
namespace src\config\connection;

class Connection

{
    public function connection()
    {
        try {
            $pdo = new \PDO("mysql:dbname=".DBDRIVE.";host=".DBHOST.";charset=utf8", DBUSER, DBPASS);
            
            return $pdo;
        }
        catch (\Exception $e) {
            echo "Erro ao conectar com o banco de dados! " . $e;
        }

    }
}
