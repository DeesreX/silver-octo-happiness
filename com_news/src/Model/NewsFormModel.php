<?php

namespace Fox5\Component\News\Administrator\Model;

use Joomla\CMS\Form\Form;
use Joomla\CMS\MVC\Model\FormModel;

class NewsFormModel extends FormModel
{
    protected $item;

    public function getForm($data = array(), $loadData = true)
    {
        // Get the form object.
        $form = $this->loadForm('com_news.newsform', 'newsform', array('control' => 'jform', 'load_data' => $loadData));

        if (!$form)
        {
            return false;
        }

        // Return the form object.
        return $form;
    }
}
