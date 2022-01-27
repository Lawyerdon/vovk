<?php
namespace controllers;
use View;
use Task;

class Index
{
    /**
     * @var View
     */
    private $view;
    /**
     * @var Task
     */
    private $task;

    public function __construct()
    {
        $this->task = new Task();
        $this->view = new View();
    }
}