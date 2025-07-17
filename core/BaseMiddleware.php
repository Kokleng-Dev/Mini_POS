<?php

namespace Core;

class BaseMiddleware
{
     protected function redirect($location, $statusCode = 200, $sms = null, $exit = true) {
        http_response_code($statusCode);
        if ($sms) {
            $_SESSION['sms'] = $sms;
        }
        header("Location: $location");
        if ($exit) {
            exit();
        }
    }
}
