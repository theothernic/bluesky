<?php
    namespace Theothernic\Bluesky;

    use \GuzzleHttp\Client as GuzzleClient;
    use GuzzleHttp\Exception\GuzzleException;
    use Theothernic\Bluesky\Models\Session;
    use Theothernic\PosseSpec\Interfaces\ISyndicatable;
    use Theothernic\PosseSpec\Models\Content;

    class Client implements ISyndicatable
    {
        private GuzzleClient $client;
        private Session $session;

        public function __construct()
        {
            $config = [
                'base_uri' => 'https://bsky.social/xrpc'
            ];

            $this->client = new GuzzleClient($config);
        }

        public function post(Content $content)
        {
            try
            {
                if (!$this->session)
                    $this->createSession();

                $req = $this->client->request('post', '/com.atproto.server.createSession');
            }

            catch (GuzzleException $e)
            {

            }

        }

        private function createSession()
        {
            $req = $this->client->request('post', '/com.atproto.server.createSession');


        }
    }