<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class DebrickedService
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function uploadFile($file, $jwtToken): array
    {
        $response = $this->client->request('POST', 'https://debricked.com/api/upload', [
            'headers' => ['Authorization' => "Bearer $jwtToken"],
            'body' => ['file' => fopen($file, 'r')]
        ]);

        return $response->toArray();
    }

    public function startScan(int $uploadId, string $jwtToken): array
    {
        $response = $this->client->request('POST', "https://debricked.com/api/scan/$uploadId", [
            'headers' => ['Authorization' => "Bearer $jwtToken"]
        ]);

        return $response->toArray();
    }
}
