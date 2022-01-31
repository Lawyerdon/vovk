<?php
namespace controllers;
use core\View;
use db\Task;
use core\Route;
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
       $this->view->render('tasks',['tasks'=>$this->task->all()]);
    }
    public function create(){
        $this->view->render('create');
    }
    public function store(){
        $task = filter_input(INPUT_POST, 'article');
        $this->task->add($task);
        Route::redirect(Route::url('index', 'index'));
    }
    public function edit(){
        $id=filter_input(INPUT_POST,'id');
        $this->task->getItem($id);
        $this->view->render('edit',['task'=> $this->task->getItem($id)]);
    }
    public function delete(){
        $id = filter_input(INPUT_POST, 'id');
        $this->task->delete($id);
        Route::redirect(Route::url('index','index'));
    }
    public function update(){
        $id = filter_input(INPUT_POST, 'id');
        $name =filter_input(INPUT_POST,'name');
        $this->task->change($id, $name);
        Route::redirect(Route::url('index','index'));
    }
}