<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_banners
 *
 * @copyright   (C) 2008 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Fox5\Component\News\Site\View\News;

use Fox5\Component\News\Site\Model\NewsModel;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * View to edit a banner.
 *
 * @since  1.5
 */
class HtmlView extends BaseHtmlView
{
    protected $model;
    public function display($tpl = null): void
    {
        $this->model = new NewsModel();
        $this->items = $this->model->getItems();
    
        parent::display($tpl);
    }

}
