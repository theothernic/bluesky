<?php
    namespace Theothernic\Bluesky;

    use \GuzzleHttp\Client as GuzzleClient;
    use GuzzleHttp\Exception\GuzzleException;
    use Theothernic\Bluesky\Models\Configuration;
    use Theothernic\Bluesky\Models\Session;
    use Theothernic\Bluesky\Requests\CreateSessionRequest;
    use Theothernic\PosseSpec\Interfaces\ISyndicatable;
    use Theothernic\PosseSpec\Models\Content;

    class Client implements ISyndicatable
    {
        private Configuration $config;
        private GuzzleClient $client;
        private Session $session;

        public function __construct(Configuration $config)
        {
            $this->setConfig($config);
            $this->setupClient();
        }

        public function setConfig(Configuration $config): void
        {
            $this->config = $config;
        }

        private function setupClient(): void
        {
            $config = [
                'base_uri' => $this->config->baseUri
            ];

            $this->client = new GuzzleClient($config);
        }

        public function post(Content $content)
        {
            try
            {
                if (!$this->session)
                    $this->createSession($this->config->handle, $this->config->appPassword);

                $req = $this->client->request('post', '/com.atproto.server.createSession');
            }

            catch (GuzzleException $e)
            {

            }

        }

        private function createSession(string $identifier, string $password): Session|null
        {
            $req = new CreateSessionRequest([
                'identifier' => $identifier,
                'password' => $password
            ]);

            $res = $this->client->sendRequest($req->create());

            return null;
        }
    }