<?php
class BaseController
{
    protected $IsUser = false;
    function render($viewFile, $data = array())
    {
        extract($data);
        ob_start();
        require_once($viewFile);
        $content = ob_get_clean();
        require_once('./views/Layouts/mainLayout.php');
        
    }
}
