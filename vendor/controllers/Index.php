<?php
namespace controllers;
use View;
use Task;
use Route;
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

    public function __construct(){
        $this->task = new Task();
        $this->view = new View('default');
    }
    public function index(){
        $this->view->render('index',['tasks'=>$this->task]);
    }
    public function create(){
        $this->view->render('create');
    }
    public function store(){

    }
}