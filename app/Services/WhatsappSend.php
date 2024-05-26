<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class WhatsappSend
{
    /**
     * Make a request to the KirimWA.id API.
     *
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function apiKirimWaRequest(array $params)
    {
        $response = null;
        $statusCode = null;

        $url = $params['url'];
        $token = $params['token'] ?? '';
        $method = $params['method'] ?? 'GET';
        $payload = $params['payload'] ?? '';

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];

        if ($method === 'POST') {
            $headers['Content-Length'] = strlen($payload);
        }

        try {
            $response = Http::withHeaders($headers)
                ->timeout(15)
                ->withBody($payload, 'application/json')
                ->$method($url);

            $statusCode = $response->status();

            if ($statusCode >= 200 && $statusCode < 300) {
                return ['body' => $response->body(), 'statusCode' => $statusCode, 'headers' => $response->headers()];
            }

            throw new Exception($response->body(), $statusCode);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $statusCode);
        }
    }
}
