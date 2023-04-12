<?php

namespace Fox5\Component\News\Site\Controller;

use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

class DisplayController extends BaseController
{
    protected $default_view = 'news';

    public function display($cachable = false, $urlparams = [])
    {
        return parent::display();
    }
}
