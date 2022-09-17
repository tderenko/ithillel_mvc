<?php


namespace Core;


class Request
{
    protected string $scheme;
    protected string $host;
    protected string $path;
    protected string $method;
    protected string $query;
    protected string $agent;
    protected string $referer;
    protected array $getParams = [];
    protected array $postParams = [];

    public function __construct()
    {
        $this->scheme = $_SERVER['REQUEST_SCHEME'] ?? '';
        $this->host = $_SERVER['HTTP_HOST'] ?? '';
        $this->path = $_SERVER['REQUEST_URI'] ?? '';
        $this->method = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->query = $_SERVER['QUERY_STRING'] ?? '';
        $this->agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $this->referer = $_SERVER['HTTP_REFERER'] ?? '';
        $this->getParams = $_GET;
        $this->postParams = $_POST;
    }

    /**
     * @return mixed|string
     */
    public function getAgent(): mixed
    {
        return $this->agent;
    }

    /**
     * @return mixed|string
     */
    public function getHost(): mixed
    {
        return $this->host;
    }

    /**
     * @return mixed|string
     */
    public function getMethod(): mixed
    {
        return $this->method;
    }

    /**
     * @return mixed|string
     */
    public function getPath(): mixed
    {
        return $this->path;
    }

    /**
     * @return mixed|string
     */
    public function getQuery(): mixed
    {
        return $this->query;
    }

    public function getGetParams(string $key = null): mixed
    {
        if (!$key) {
            return $this->getParams;
        }

        return $this->getParams[$key] ?? null;
    }

    public function getPostParams(string $key = null): mixed
    {
        if (!$key) {
            return $this->postParams;
        }

        return $this->postParams[$key] ?? null;
    }

    public function getReferer(): mixed
    {
        return $this->referer;
    }

    public function getScheme()
    {
        return $this->scheme;
    }

    public function getHostUrl(): string
    {
        return "{$this->scheme}://{$this->host}";
    }
}
