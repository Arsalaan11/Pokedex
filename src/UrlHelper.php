<?php

namespace Pokedex;

class UrlHelper
{
    /**
     * @param string|null $url
     * @return int|null
     */
    public function getOffset(string $url = null): ?int
    {
        if (!$url) {
            return null;
        }
        parse_str(substr($url, strpos($url, '?') + 1), $output);
        return $output['offset'] ?? 0;
    }
}