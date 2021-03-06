<?php
namespace controllers;
use core\AbstractController;
use core\Route;
use db\Task;
class Index extends AbstractController
{
    public function __construct(){
        parent::__construct();
        $this->model = new Task();
    }

    public function index(){
        $this->view->render('index_'.self::controllerName(),['tasks'=>$this->model->all()]);
    }

    public function create(){
        $this->view->render('create_'.self::controllerName());
    }

    public function store(){
        $name = filter_input(INPUT_POST, 'name');
        $this->model->add($name);
        Route::redirect(Route::url(self::controllerName(), 'index'));
    }

    public function edit(){
        $id=filter_input(INPUT_POST,'id');
        $this->model->getItem($id);
        $this->view->render('edit_'.self::controllerName(),['task'=> $this->model->getItem($id)]);
    }

    public function delete(){
        $id = filter_input(INPUT_POST, 'id');
        $this->model->delete($id);
        Route::redirect(Route::url(self::controllerName(),'index'));
    }

    public function update(){
        $id = filter_input(INPUT_POST, 'id');
        $name =filter_input(INPUT_POST,'name');
        $this->model->change($id, $name);
        Route::redirect(Route::url(self::controllerName(),'index'));
    }
}