<?php
namespace src\controller\ClientsController;

use src\models\Clients\Clients;

class ClientsController
{
    
    private $clients;
    public function __construct() {
        $clients = new Clients;
        $this->clients = $clients;
    }

    public function selectAll()
    {
        $res = $this->clients->selectAll();
        return $res;
        
    }

    public function selectOne(int $id)
    {
        $res = $this->clients->selectOne($id);
        return $res;
        
    }

    public function create(array $params)
    {
        $res = $this->clients->create($params);
        return $res;
        
    }

    public function update(array $params, int $id)
    {
        $res = $this->clients->update($params, $id);
        return $res;
        
    }

    public function delete(int $id)
    {
        $res = $this->clients->delete($id);
        return $res;
        
    }
}
