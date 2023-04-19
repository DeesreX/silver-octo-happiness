<?php


namespace Fox5\Component\News\Administrator\View\Newsform;
use Fox5\Component\News\Administrator\Controller\NewsController;
defined('_JEXEC') or die;

use Exception;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Form\Form;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\Component\Banners\Administrator\Model\BannerModel;
use Fox5\Component\News\Administrator\Model\NewsFormModel;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * View to edit a banner.
 *
 * @since  1.5
 */
class HtmlView extends BaseHtmlView {
    public function display($tpl = null)
    {
        $this->model = new NewsFormModel();
        $this->form = $this->model->getForm();
        // Set the toolbar
        $this->addToolbar();

        // Display the view template
        parent::display($tpl);
    }

    protected function addToolbar()
    {
        // Add the title to the toolbar
        ToolbarHelper::title('Add News Article');
        ToolbarHelper::save();
        ToolbarHelper::cancel('newsform.cancel');
    }
}
