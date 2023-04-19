<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_banners
 *
 * @copyright   (C) 2008 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Fox5\Component\News\Administrator\View\News;

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
    protected $form;

    protected $item;

    protected $state;

    public function display($tpl = null): void
    {
        parent::display($tpl);
    }

}
