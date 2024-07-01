<?php

namespace App\Services;

use GuzzleHttp\Client;
class ApiServicesPecas
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPecas()
    {
        try {
            $response = $this->client->get('http://host.docker.internal:8000/getItens');
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
    
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Erro ao decodificar JSON: ' . json_last_error_msg());
            }
    
            return $data;
        } catch (\Exception $e) {
            \Log::error('Erro ao buscar peças: ' . $e->getMessage());
            return null;
        }
    }
}
