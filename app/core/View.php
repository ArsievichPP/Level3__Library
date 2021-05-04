<?php


namespace app\core;


class View
{
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    /**
     * renders the page
     * @param $data array information for rendering the template
     */
    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }

        // content template
        $fileView = APP . "/views/{$this->route['controller']}/{$this->view}.php";

        // connect content template and save in buffer
        ob_start();
        if (is_file($fileView)) {
            require $fileView;
        } else {
            echo 'file view is not found' . $fileView;
        }
        $content = ob_get_clean();


        if (false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                require $file_layout;
            } else {
                header('HTTP/1.1 404 layout is not found');
            }
        }
    }

}