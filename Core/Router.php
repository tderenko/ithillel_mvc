<?php

namespace Core;

class Router
{
    protected array $routes = [], $params = [];

    protected array $convertTypes = [
        'd' => 'int',
        'w' => 'string'
    ];

    public function add(string $route, array $params = [])
    {
        $route = '/^' . preg_replace([
            '/\//',
            '/\{[a-zA-Z]+\}/',
            '/\{([a-zA-Z_]+):([^\}]+)\}/'
        ], [
            '\/',
            '/(?P<\1>[a-z-]+)/',
            '(?P<\1>\2)'
        ], $route) . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * @throws \Exception
     */
    public function dispatch(Request $request)
    {
        $url = trim($request->getPath(), '/');
        $url = $this->removeQuesryStringVariables($url);
        if ($this->match($url)) {
            if (array_key_exists('method', $this->params) && ($request->getMethod() !== $this->params['method'])) {
                throw new \Exception("Method " . $request->getMethod() . " doesn't supported by this route");
            }
            return [$this->params['controller'], $this->params['action'], array_diff_key($this->params, array_flip(['controller', 'action', 'method']))];
        }
        throw new \Exception("Page \"$url\" not found!!!", 404);
    }

    protected function match(string $url)
    {
        foreach($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $this->setParams($route, $matches, $params);
                return true;
            }
        }
        return false;
    }

    protected function setParams(string $route, array $matches, array $params): array
    {
        preg_match_all('/\(\?P<\w+>\\\\(\w)\+\)/i', $route, $types);
        $types = end($types);
        $matches = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

        if (!empty($types)) {
            $step = 0;
            foreach($matches as $key => $match) {
                settype($match, $this->convertTypes[$types[$step++]]);
                $params[$key] = $match;
            }
        }

        return $params;
    }

    protected function removeQuesryStringVariables(string $url): string
    {
        return preg_replace('/^([^?]+)\??.*$/i', '$1', $url);
    }
}
