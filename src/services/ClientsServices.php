<?php
namespace services\ClientsServices;

require_once './src/controller/clientes/ClientsController.php';
use src\controller\ClientsController\ClientsController;
class ClientsServices extends ClientsController
{
    public function __construct() {
        $this->controllerCliente = new ClientsController;
    }

    public function _createClient(array $params)
    {
        $response = $this->controllerCliente->create($params);
        return $response;
    }
    public function _updateClient(array $params, int $id)
    {
        
        $client = $this->controllerCliente->selectOne($id);
        if (!$client) {
            return json_encode([
                "status" => 'Error',
                 "msg"   =>  'Cliente não encontrado'
            ]);
        }
        $response = $this->controllerCliente->update($params, $id);

        return $response;
    }
    public function _deleteClient(int $id)
    {
        $response = $this->controllerCliente->delete($id);
        return $response;
    }

}

$clienteService = new ClientsServices;

if (@$_POST['action']) {
   
    $action = @$_POST['action'];
    switch ($action) {
        case 'create':
            $response = $clienteService->_createClient($_POST);
            return $response;
            break;
        case 'update':
            $response = $clienteService->_updateClient($_POST, intval($_POST['id']));
            return $response;
            break;
        case 'deletar':
            $response = $clienteService->_deleteClient(intval($_POST['id']));
            return $response;
            break;
        default:
            # code...
            break;
    }
}