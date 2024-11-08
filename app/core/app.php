<?php
class App{
    
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database();

    }

    // public function run(){
    //    echo $this->router->resolve();
    // }
    public function run() {
        $output = $this->router->resolve();
        
        if (is_array($output)) {
            echo "<pre>" . print_r($output, true) . "</pre>";
        } else {
            echo $output;
        }
    }
    
}
?>