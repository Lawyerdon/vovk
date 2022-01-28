<?php
namespace controllers;
use vendor\core\View;
use vendor\db\Task;
use vendor\db\Route;
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
        $this->task->updateById($id);
        Route::redirect(Route::url('index','index'));
    }
}