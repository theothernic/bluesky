<?php
    namespace Theothernic\Bluesky\Requests;

    use GuzzleHttp\Psr7\Request;

    abstract class JsonRequest
    {
        private string $uri = '';
        private string $method = 'POST';

        private array $headers = [];

        private string $body = '';

        public function set(string $k, string $v): void
        {
            $this->data[$k] = $v;
        }

        public function get(string $k): mixed
        {
            return $this->data[$k];
        }

        public function setMethod(string $method): void
        {
            $this->method = $method;
        }

        public function setUri(string $uri): void
        {
            $this->uri = $uri;
        }

        public function setHeader(string $k, string $v): void
        {
            $this->headers[$k] = $v;
        }

        public function setBody(): void {}

        public function getBody(): string
        {
            return $this->body;
        }

        public function useBearerAuthorization(string $token): void
        {
            $this->headers['Authorization'] = sprintf('Bearer %s', $token);
        }

        public function create(): Request
        {
            return new Request($this->method,
                            $this->uri,
                            $this->headers,
                            json_encode($this->data)
            );
        }
    }