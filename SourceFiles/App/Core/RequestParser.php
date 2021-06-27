<?php

namespace App\Core;

class RequestParser
{
    public array $getList;
    public array $postList;
    public String $action;
    public String $controller;

    public function __construct(RequestParser $requestParser = NULL)
    {
        if ($requestParser == NULL) :
            $this->getList = (isset($_GET) ? $this->clearGetValues() : NULL);
            $this->postList = (isset($_POST) ? $this->clearPostValues() : NULL);
            $this->controller = (isset($this->getList['controller']) ? $this->getList['controller'] : NULL);
            $this->action = (isset($this->getList['action']) ? $this->getList['action'] : NULL);
        else :
            $this = $requestParser;
        endif;
    }

    private function clearGetValues()
    {
        $stampList = array();

        foreach ($_GET as $key => $value) :
            if (is_string($value)) :
                $stampList[$key] = htmlspecialchars($value);
            else :
                $stampList[$key] = $value;
            endif;
        endforeach;
        unset($value);
        unset($key);

        return $stampList;
    }

    private function clearPostValues()
    {
        $stampList = array();

        foreach ($_POST as $key => $value) :
            if (is_string($value)) :
                $stampList[$key] = htmlspecialchars($value);
            else :
                $stampList[$key] = $value;
            endif;
        endforeach;
        unset($value);
        unset($key);

        return $stampList;
    }
}
