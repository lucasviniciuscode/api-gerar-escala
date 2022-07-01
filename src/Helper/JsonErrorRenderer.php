<?php

declare(strict_types=1);

namespace App\Helper;

use Slim\Interfaces\ErrorRendererInterface;
use Throwable;

class JsonErrorRenderer implements ErrorRendererInterface
{
    /**
     * @param Throwable $exception
     * @param bool      $displayErrorDetails
     * @return string
     */
    public function __invoke(Throwable $exception, bool $displayErrorDetails): string
    {
        $message = 'Erro inesperado';
        $code = $exception->getCode();
        switch ($code) {
            case 400:
                $message = $exception->getMessage();
                break;
            case 404:
                $message = 'Rota não encontrada';
                break;
        }

        $error = [
            'code' => $exception->getCode(),
            'message' => $message,
            'data' => [],
        ];

        if ($displayErrorDetails) {
            $error['exception'] = [];
            do {
                $error['exception'][] = $this->formatExceptionFragment($exception);
            } while ($exception = $exception->getPrevious());
        }

        return (string) json_encode($error, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param Throwable $exception
     * @return array<string|int>
     */
    private function formatExceptionFragment(Throwable $exception): array
    {
        return [
            'type' => get_class($exception),
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
        ];
    }
}
