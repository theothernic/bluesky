<?php
    namespace Theothernic\Bluesky\Models;

    class Post
    {
        public string $type = 'app.bsky.feed.post';

        public string $text;

        public \DateTime $createdAt;
    }