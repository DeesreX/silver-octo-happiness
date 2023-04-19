<?php

namespace Fox5\Component\News\Site\Controller;
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;

class DisplayController extends BaseController
{
    protected $default_view = 'news';

    public function display($cachable = false, $urlparams = [])
    {
        return parent::display();
    }
}
