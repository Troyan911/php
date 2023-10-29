<?php

class Router
{

    private array $routes;

    /**
     * @param string $url
     * @param array $handler
     * @return void
     */
    public function addRoute(string $url, array $handler): void
    {
        $this->routes[$url] = $handler;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function processRoute(): void
    {

        foreach ($this->routes as $uri => $routes) {
            if ($uri === $this->getRequestUri()) {
                foreach ($routes as $httpMethod => $handler) {
                    if ($httpMethod === $this->getRequestMethod()) {
                        [$controllerName, $method] = $this->parseHandler($handler);

                        $fullControllerPath = __DIR__ . "/Controllers/$controllerName.php";

                        $this->checkControllerFile($fullControllerPath);
                        require_once $fullControllerPath;

                        $controllerObject = new $controllerName;
                        $this->checkControllerMethod($controllerObject, $method);
                        $controllerObject->$method();
                        return;
                    }
                }
            }
        }
        http_response_code(404);
        exit;
    }


    /**
     * @param string $fullHandlerPath
     * @return void
     * @throws Exception
     */
    private function checkControllerFile(string $fullHandlerPath)
    {
        if (!file_exists($fullHandlerPath)) {
            throw new Exception("Invalid controller provided! Controller $fullHandlerPath not found!");
        }

    }

    /**
     * @param object $controllerObject
     * @param string $controllerMethod
     * @return void
     * @throws Exception
     */
    private function checkControllerMethod(object $controllerObject, string $controllerMethod): void
    {
        if (!method_exists($controllerObject, $controllerMethod)) {
            throw new Exception("Invalid method provided! Method $controllerMethod not found!");
        }
    }

    /**
     * @param string $handler
     * @return array
     */
    private function parseHandler(string $handler): array
    {
        return explode("@", $handler);
    }

    /**
     * @return string
     */
    private function getRequestUri(): string
    {
        return str_replace("/src/hw22v2/", "", $_SERVER["REQUEST_URI"]);
    }

    /**
     * @return string
     */
    private function getRequestMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"] ?? "";
    }

}