<?php
namespace routes;

use src\controller\ClientsController\ClientsController;

require_once './src/config/config.php';
require_once './src/config/connection.php';

require_once './src/model/Clients.php';
require_once './src/controller/clientes/ClientsController.php';

class Routes 
{
    protected $url;
    protected $action;
    protected $params;
    protected $controller;

    public function __construct() {
        $url = $this->url;
        $action = $this->action;
        $params = $this->params;
        $controller = $this->controller;
        
        $this->controller = new ClientsController();
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
                    'data'      => [$res]
                ]
            ];
            return $return;
        }
        if (count($uri) > 1) {
            $this->path = $uri[0];
            $this->action = $uri[1];
            $this->params = @$uri[2];

            $return = [
                'router' => './src/resources/view/'.$this->path.'/'.$this->action.'.php',
                'data'   => [
                    'params_url' => $this->params,
                    'action'    => $this->action,
                    'path'      => $this->path,
                    'data'      => []
                ]
            ];
            return $return;
        }
        
    }

    public function action(string $action, int $id = null, array $params = null)
    {
        switch ($action) {
            case 'listar':
                $response = $this->controller->selectAll();
                break;
            case 'criar':
                $response = $this->controller->create($params);
                break;
            case 'update':
                $response = $this->controller->update($params);
                break;
            case 'deletar':
                $response = $this->controller->delete($id);
                break;
            default:
                # code...
                break;
        }
      
    }
}
