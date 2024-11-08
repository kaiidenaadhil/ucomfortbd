<?php
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];


    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resource($path, $model, $controllerClass)
    {
        $this->get("/{$path}", [$controllerClass, "{$model}Index"]);
        $this->get("/{$path}/build", [$controllerClass, "{$model}Build"]);
        $this->post("/{$path}/build", [$controllerClass, "{$model}Record"]);
        $this->get("/{$path}/{{$model}Identify}/destroy", [$controllerClass, "{$model}Destroy"]);
        $this->get("/{$path}/{{$model}Identify}/modify", [$controllerClass, "{$model}Modify"]);
        $this->post("/{$path}/{{$model}Identify}/modify", [$controllerClass, "{$model}Edit"]);
        $this->get("/{$path}/{{$model}Identify}", [$controllerClass, "{$model}Display"]);
    }

    public function middleware($middlewareClass)
    {
        $middleware = new $middlewareClass();
        return function ($request) use ($middleware) {
            return $middleware->handle($request, function ($request) {
                return $this->resolve($request);
            });
        };
    }


    public function resolve()
    {
        global $currentPage;
        $path = $this->request->getPath();
        $path = rtrim($path, '/');
        $method = $this->request->method();
    
        foreach ($this->routes[$method] as $routePath => $callback) {
            $routePattern = '#^' . preg_replace('/\{(.*?)\}/', '([^/]+)', $routePath) . '$#';
    
            if (strpos($routePath, '+') !== false) {
                $routePattern = '#^' . preg_replace('/\{(.*?)\}/', '([^/]+)', str_replace('+', '\+', $routePath)) . '$#';
            }
    
            if (preg_match($routePattern, $path, $matches)) {
                array_shift($matches);
    
                if (is_string($callback)) {
                    return $this->view($callback, $matches);
                }
    
                if (is_array($callback)) {
                    require_once "../app/controllers/" . $callback[0] . ".php";
                    $controller = new $callback[0]();
                    return call_user_func_array([$controller, $callback[1]], [$this->request, ...$matches]);
                }
    
                return call_user_func_array($callback, $matches);
            }
        }
    
        $this->response->setStatusCode(404);
        return "Not Found";
    }
    
   
    


    public function view($view, $params = [])
    {
        $layout = $this->layout($params = []);
        $content = $this->onlyView($view, $params);
        //  return str_replace('{{content}}', $content, $layout);
        return preg_replace('/{{\s*content\s*}}/', $content, $layout);
    }

    protected function layout($params = [])
    {
        ob_start();
        include_once "../app/views/" . THEME . "/layout/main.php";
        return ob_get_clean();
    }

    protected function onlyView($view, $params)
    {
        ob_start();
        include_once "../app/views/" . THEME . "/$view.php";
        return ob_get_clean();
    }

    public function getRoutes()
    {
        return $this->routes;
    }


    public function isRouteActive($path)
    {
        $currentPath = $this->request->getPath();
        $currentPath = rtrim($currentPath, '/');

        return $currentPath === $path;
    }

}
