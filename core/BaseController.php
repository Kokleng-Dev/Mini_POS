<?php

namespace Core;

class BaseController
{
    protected function render($view,$data = [],  $title = null)
    {
        extract($data);
        $title = $title == null ? strtoupper($view) : $title;
        require __DIR__ . "/../app/Views/layouts/header.php";
        require __DIR__ . "/../app/Views/$view.php";
        require __DIR__ . "/../app/Views/layouts/footer.php";
    }
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
