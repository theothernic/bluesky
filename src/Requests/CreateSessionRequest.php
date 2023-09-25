<?php
    namespace Theothernic\Bluesky\Requests;

    use GuzzleHttp\Psr7\Request;

    class CreateSessionRequest extends JsonRequest
    {
        public string $identifier;
        public string $password;
        public function __construct(array $config)
        {
            $this->identifier = $config['identifier'];
            $this->password = $config['password'];

            $this->setMethod('POST');
            $this->setUri('/com.atproto.server.createSession');
        }

        public function setBody(): void
        {
            $data = new \stdClass();
            $data->identifier = $this->identifier;
            $data->password = $this->password;

            $this->body = json_encode($data);
        }

        public function create(): Request
        {
            $this->setBody();
            return parent::create();
        }
    }