<?php

namespace App\Model;

use DateTime;

class Calendar
{
    public function getMonthlySchedule(array $pessoas, int $first, string $mes): array
    {
        $quantidade = sizeof($pessoas);
        $funcao = new DateTime($mes);
        $numDias = $funcao->format('t');

        $arrayMonth['month'] = $funcao->format('Y-m');
        for ($i = 1; $i <= $numDias; $i++) {
            $first = $first % $quantidade;
            $arrayMonth[$i] = [$pessoas[$first]];
            $first++;
        }

        return $arrayMonth;
    }
}
