<?php
namespace routes;

use services\ClientsServices\ClientsServices;
use src\controller\ClientsController\ClientsController;

require_once './src/config/config.php';
require_once './src/config/connection.php';

require_once './src/model/Clients.php';
require_once './src/controller/clientes/ClientsController.php';

require_once './src/services/ClientsServices.php';

class Routes 
{
    protected $url;
    protected $action;
    protected $params;
    protected $controller;
    protected $services;

    public function __construct() {
        $url = $this->url;
        $action = $this->action;
        $params = $this->params;
        $controller = $this->controller;
        $services = $this->services;

        $this->controller = new ClientsController();
        //$this->services = new ClientsServices();
    }

    public function redirect(Array $uri = null)
    {
        if (!$uri['url']) {
            return './src/resources/view/index';
        }
        $uri = explode('/',trim($uri['url']));
        
        if (count($uri) <= 1) {
            $this->path = $uri[0];
            $res = $this->action('listar');
            $return = [
                'router' => './src/resources/view/'.$this->path.'/listar.php',
                'data'   => [
                    'path' => $this->path,
                    'dados'      => $res
                ]
            ];
            return $return;
        }
        if (count($uri) > 1) {
            $this->path = $uri[0];
            $this->action = $uri[1];
            $this->params = @$uri[2];
            $res = [];
            if ($this->action != 'criar' && @$_POST['action'] != 'create') {
                if (@$_POST['id']) {
                    $res = $this->action($this->action, $_POST['id']);
                } else {
                    $res = $this->action($this->action, $this->params);
                }
            }
            $return = [
                'router' => './src/resources/view/'.$this->path.'/'.$this->action.'.php',
                'data'   => [
                    'params_url' => $this->params,
                    'action'    => $this->action,
                    'path'      => $this->path,
                    'data'      => $res
                ]
            ];
            return $return;
        }
        
    }

    public function action(string $action, int $id = null)
    {

        switch ($action) {
            case 'listar':
                $response = $this->controller->selectAll();
                return $response;
                break;
            case 'editar':
                $response = $this->controller->selectOne($id);
                return $response;
                break;
            case 'deletar':
                $response = $this->controller->selectOne($id);
                return $response;
                break;
            default:
                # code...
                break;
        }
      
    }
}
