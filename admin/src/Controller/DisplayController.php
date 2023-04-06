<?php

namespace Fox5\Component\News\Administrator\Controller;

use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;
use Joomla\Component\Banners\Administrator\Helper\BannersHelper;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

class DisplayController extends BaseController
{
    protected $default_view = 'newsform';

    public function display($cachable = false, $urlparams = [])
    {
        return parent::display();
    }
}
