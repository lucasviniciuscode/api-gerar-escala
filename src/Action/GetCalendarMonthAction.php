<?php

namespace App\Action;

use App\Model\Calendar;
use App\Model\Timeline;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GetCalendarMonthAction extends Action
{
    public function __construct(private Calendar $calendar)
    {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $parsedBody = $request->getParsedBody();
        $data = $this->calendar->getMonthlySchedule($parsedBody['nomes'], $parsedBody['primeiro'], $parsedBody['data']);

        return $this->toJson($response, $data);
    }
}
