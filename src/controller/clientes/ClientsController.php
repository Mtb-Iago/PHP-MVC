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

        print_r($res);
        
    }

    public function selectOne(int $id)
    {
        $res = $this->clients->selectOne($id);

        print_r($res);
        
    }

    public function create(array $params)
    {
        $res = $this->clients->create($params);

        print_r($res);
        
    }

    public function update(array $params)
    {
        $res = $this->clients->update($params);

        print_r($res);
        
    }

    public function delete(int $id)
    {
        $res = $this->clients->delete($id);

        print_r($res);
        
    }
}
