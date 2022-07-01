<?php

use Slim\App;

return function (App $app) {
    $app->post('/calendar', \App\Action\GetCalendarMonthAction::class);
};
