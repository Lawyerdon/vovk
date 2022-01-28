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
       $this->view->render('index',['tasks'=>$this->task->all()]);
    }
    public function create(){
        $this->view->render('create');
    }
    public function store(){
        $id = filter_input(INPUT_POST, 'id');
        $this->task->addById($id);
        Route::redirect(Route::url('index', 'index'));
    }
    public function edit(){
        $id = filter_input(INPUT_POST, 'id');
        $this->view->render('edit',['id'=>$id]);
    }
    public function delete(){
        $id = filter_input(INPUT_POST, 'id');
        $this->task->deleteById($id);
        Route::redirect(Route::url('index','index'));
    }
    public function update(){
        $id = filter_input(INPUT_POST, 'id');
        $this->task->changeById($id, $name);
        Route::redirect(Route::url('index','index'));
    }
}