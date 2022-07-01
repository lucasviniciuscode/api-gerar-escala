<?php

declare(strict_types=1);

namespace App\Helper;

use Psr\Http\Message\ResponseInterface;

class JsonResponseRenderer
{
    public static function toJson(ResponseInterface $response, array $data = [], string $message = 'ok', int $httpCode = 200): ResponseInterface
    {
        $payload = [
            'code' => $httpCode,
            'message' => $message,
            'data' => $data
        ];

        $json = json_encode($payload, JSON_THROW_ON_ERROR);
        $response->getBody()->write($json);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
