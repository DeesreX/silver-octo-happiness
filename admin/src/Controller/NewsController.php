<?php
namespace Fox5\Component\News\Administrator\Controller;

use Fox5\Component\News\Administrator\Model\NewsFormModel;
use Joomla\CMS\MVC\Controller\FormController;
use Joomla\Input\Input;

class NewsController extends FormController
{
    protected $view_item = 'edit'; // Set the edit view as the default view for this controller.
    public function execute($task)
    {

        switch ($task) {
            case 'save':
                $input = new Input();
                $formData = $input->get('jform', []);
                $newsformModel = new NewsFormModel();
                $newsformModel->saveForm(($formData));
                break;

            case 'edit':
                $input = new Input();
                $formData = $input->get('jform', []);
                $newsformModel = new NewsFormModel();
                $newsformModel->saveForm(($formData));
                break;

            default:
                # code...
                break;
        }

    }

}