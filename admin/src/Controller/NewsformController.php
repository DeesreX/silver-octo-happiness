<?php
namespace Fox5\Component\News\Administrator\Controller;
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\FormController;

class NewsformController extends FormController
{
    public function execute($task){
        die($task);
    }

    public function cancel(){
        die("CANCELLLED!!!");
    }

    public function save($key = null, $urlVar = null)
    {
        die("Saving")
    }
    
}
