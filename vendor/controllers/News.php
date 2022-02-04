<?php
namespace controllers;
use core\AbstractController;
use core\Route;
use db\News as NewsModel;

class News extends AbstractController
{
    public function __construct(){
        parent::__construct();
        $this->model = new NewsModel();
    }

    public function index(){
        $this->view->render('index_'.self::controllerName());
    }
    //API actions
    public function all(){
        header('Content-Type: application/json');
        echo json_encode($this->model->all());
    }

   public function store(){
        $title = filter_input(INPUT_POST, 'title');
        $text = filter_input(INPUT_POST, 'text');
        if($this->model->add($title, $text)){
            http_response_code(201);
        }else{
            //TODO log
            http_response_code(520);
        }
    }

    public function delete(){
        $id = filter_input(INPUT_POST, 'id');
        $this->model->delete($id);
        if($this->model->delete($id)) {
            http_response_code(200);
        } else {
            http_response_code(520);
        }
    }

    public function edit(){
        $id=filter_input(INPUT_POST,'id');
        $this->model->getItem($id);
        $this->view->render('edit_'.self::controllerName(),['task'=> $this->model->getItem($id)]);
    }



    public function update(){
        $id = filter_input(INPUT_POST, 'id');
        $name =filter_input(INPUT_POST,'name');
        $this->model->change($id, $name);
        Route::redirect(Route::url(self::controllerName(),'index'));
    }

}