<?php


namespace core;


abstract class AbstractController implements controllerable
{
    /**
     * @var View
     */
    protected $view;
    /**
     * @var AbstractModel
     */
    protected $model;

    public function __construct()
    {
        $this->view = new View('default');
    }

    static public function controllerName(){
        $path = explode('\\', static::class);
        return strtolower(array_pop($path));
    }
}