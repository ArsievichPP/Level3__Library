<?php
namespace app\core;


abstract class Controller
{
    public $route = array();
    public $viewName; // name of content-template
    public $layout; // main layout
    public $data; // data for rendering layout

    public function __construct($route)
    {
        $this->route = $route;
        $this->viewName = $route['action'];
    }

    /**
     *  creates an object of the view class and renders the page
     */
    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->viewName);
        $vObj->render($this->data);
    }

    /**
     * saves data to a class variable
     * @param $data array for rendering layout
     */
    public function setData($data){
        $this->data = $data;
    }

}