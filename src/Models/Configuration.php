<?php
    namespace Theothernic\Bluesky\Models;

    class Configuration
    {
        public string $handle;
        public string $appPassword;

        public string $baseUri = 'https://bsky.social/xrpc';
    }