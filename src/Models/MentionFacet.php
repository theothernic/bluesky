<?php
    namespace Theothernic\Bluesky\Models;

    class MentionFacet extends Facet
    {
        public string $type = 'app.bsky.richtext.facet#mention';
        public string $did = '';

    }