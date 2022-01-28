<?php


class View
{
    private $template;
    private $page;

    public function __construct($page, $template = "default")
    {
        $this->page = $page;
        $this->template = $template;
    }

    public function render($page, array $data = []) {
        extract($data);
        include_once "vendor" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $this->template . ".php";
    }
}