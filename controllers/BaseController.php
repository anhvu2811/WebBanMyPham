
<?php
class BaseController
{
  protected $folder; 
  function render($folder, $file, $data = array())
{
    $view_file = 'views/' . $folder . '/' . $file . '.php';
    if (is_file($view_file)) {
        extract($data);
        ob_start();
        require_once($view_file);
        $content = ob_get_clean();
        echo $content;
    } else {
        header('Location: index.php');
    }
}
}
