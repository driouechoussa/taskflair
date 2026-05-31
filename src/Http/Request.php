<?php

namespace Taskflair\Http;

class Request
{
    private string $method;
    private string $uri;
    private array $data;

    public function __construct()
    {
        $this->method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $this->uri = $this->parseUri();
        $this->data = $this->sanitize();
    }

    /**
     * Get the HTTP request method (GET, POST, etc.)
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Get the sanitized request URI path (e.g. /tasks)
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Fetch a specific parameter from the request body/query.
     */
    public function get(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * Get all sanitized inputs.
     */
    public function all(): array
    {
        return $this->data;
    }

    /**
     * Parse and clean the REQUEST_URI.
     */
    private function parseUri(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';
        
        // Clean leading/trailing slashes (except single slash)
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }
        
        return $path;
    }

    /**
     * Clean and sanitize input parameters.
     */
    private function sanitize(): array
    {
        $sanitized = [];
        $source = $this->method === 'GET' ? $_GET : $_POST;

        foreach ($source as $key => $value) {
            if (is_array($value)) {
                $sanitized[$key] = filter_var_array($value, FILTER_SANITIZE_SPECIAL_CHARS);
            } else {
                $sanitized[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        // Support raw JSON requests (useful for API endpoints)
        $rawInput = file_get_contents('php://input');
        if (!empty($rawInput)) {
            $jsonData = json_decode($rawInput, true);
            if (is_array($jsonData)) {
                foreach ($jsonData as $key => $value) {
                    if (is_array($value)) {
                        $sanitized[$key] = filter_var_array($value, FILTER_SANITIZE_SPECIAL_CHARS);
                    } else {
                        $sanitized[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }

        return $sanitized;
    }
}
