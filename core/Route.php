<?php

class Route
{
    private $_keyRoute = null;

    public function handleRoute($url)
    {
        global $routes;
        unset($routes['default_controller']);
        $url = trim($url, '/');
        if (empty($url)) $url = '/';
        $handleUrl = $url;
    
        if (!empty($routes)) {
            foreach ($routes as $key => $value) {
                if (strpos($url, $key) === 0) {
                    $handleUrl = $value . substr($url, strlen($key));
                    $this->_keyRoute = $key;
                    break;
                }
            }
        }
    
        return $handleUrl;
    }
    public function getUri()
    {
        return $this->_keyRoute;
    }

    public static function getFullUrl()
    {
        $uri = App::$app->getUrl();
        $url = _WEB_ROOT . $uri;
        return $url;
    }
}
