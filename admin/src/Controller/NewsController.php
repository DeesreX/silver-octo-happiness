<?php
namespace Fox5\Component\News\Administrator\Controller;
use Fox5\Component\News\Administrator\Model\NewsFormModel;
use Joomla\CMS\MVC\Controller\FormController;
use Joomla\Input\Input;

class NewsController extends FormController
{
    public function execute($task){
        $input = new Input();
        $formData = $input->get('jform', []);
        $newsformModel = new NewsFormModel();
        $newsformModel->saveForm(($formData));
    }
    
}
