<?php
    namespace Theothernic\Bluesky\Models;

    class Facet
    {
        public string $type = 'app.bsky.richtext.facet';

        public array $index = [
            'start' => 0,
            'end' => 0
        ];
    }