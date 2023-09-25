<?php
    namespace Theothernic\Bluesky\Models;

    class Session
    {

        public string $did = '';
        public ?string $accessJwt = null;
        public ?string $refreshJwt = null;
    }