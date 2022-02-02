<?php

namespace core;

class View
{
    private $template;

    public function __construct(string $template = null)
    {
        $this->template = $template??"default";
    }

    public function render(string $page, array $data = []) {
        extract($data);
        include_once "vendor" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $this->template . ".php";
    }
}