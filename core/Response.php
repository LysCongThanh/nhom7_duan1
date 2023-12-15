<?php

class Response
{
    private $statusCode;

    public function redirect($uri = '')
    {
        if (preg_match('~^(http|https)~is', $uri)) {
            echo $url = $uri;
        } else {
            $url = _WEB_ROOT . '/' . $uri;
        }
        header('Location: ' . $url);
        exit();
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function send($data = '')
    {
        http_response_code($this->statusCode);
        echo $data;
        exit();
    }
}