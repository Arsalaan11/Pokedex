<?php

namespace Pokedex;

class Client
{
    private const BASE_URL = 'https://pokeapi.co/api/v2/';

    /**
     * @param string $url
     * @return string
     */
    public function request(string $url)
    {
        $url = self::BASE_URL . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpCode != 200) {
            return json_encode([
                'code' => $httpCode,
                'message' => $data
            ]);
        }

        return $data;
    }
}