<?php


namespace Fox5\Component\News\Administrator\View\Newslist;

use Fox5\Component\News\Site\Model\NewsModel;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Toolbar\Toolbar;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;


use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class HtmlView extends BaseHtmlView
{
    protected $state;
    protected $items;
    protected $pagination;

    public function display($tpl = null)
    {
        // Set up the model
        $this->model = new NewsModel();

        // Get the items and pagination from the model
        // $this->items = 
        $this->pagination = $this->get('Pagination');

        $this->addToolbar();
        // Load the data
        $this->loadData();

        // Display the view
        parent::display($tpl);
    }

    protected function addToolbar()
    {
        ToolbarHelper::addNew('news.add');
        ToolbarHelper::title(Text::_('COM_NEWS'));
    
        // Add the new button
        // ToolbarHelper::addNew();
        
    }

    protected function loadData()
    {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
    }

    public function getItems(){
        return $this->model->getItems();
    }

}