<?php

namespace Pokedex;

class Pokemon
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Pokemon constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string|null $identifier
     * @param int $offset
     * @return array|null
     */
    public function get(string $identifier = null, int $offset = null): ?array
    {
        $output = $this->client->request('pokemon/' . strip_tags($identifier) . '?offset=' . (int) $offset . '&limit=' . (int) 99999);
        return json_decode($output, true);
    }
}