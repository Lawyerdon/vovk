<?php


class View
{
    private $template;

    public function __construct($template = "default")
    {
        $this->template = $template;
    }

    public function render($page, array $data = []) {
        extract($data);
        include_once "vendor" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $this->template . ".php";
    }
}