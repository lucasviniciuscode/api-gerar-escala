<?php

declare(strict_types=1);


namespace App\Action;

use App\Helper\JsonResponseRenderer;
use Psr\Http\Message\ResponseInterface;

abstract class Action
{
    protected function toJson(ResponseInterface $response, array $data = [], string $message = 'ok', int $httpCode = 200): ResponseInterface
    {
        return JsonResponseRenderer::toJson($response, $data, $message, $httpCode);
    }
}

