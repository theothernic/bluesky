<?php
    namespace Theothernic\Bluesky\Requests;

    use Theothernic\Bluesky\Models\Post;
    use Theothernic\Bluesky\Models\Session;

    class CreateRecordRequest extends JsonRequest
    {
        public Post $post;
        public Session $session;
        public string $collection = 'app.bsky.feed.post';

        public function __construct(Session $session, Post $post)
        {
            if ($session)
            {
                $this->useBearerAuthorization($session->accessJwt);
                $this->session = $session;
            }

            $this->post = $post;
            $this->setMethod('POST');
            $this->setUri('/com.atproto.repo.createRecord');
        }

        public function setBody(): void
        {
            $data = new \stdClass();
            $data->repo = $this->session->did;
            $data->collection = $this->collection;
            $data->post = $this->post;

            $this->body = json_encode($data);
        }
    }