<?php
namespace Fox5\Component\News\Site\View\NewsList;
use Fox5\Component\News\Administrator\Table\NewsTable;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtml;
use Joomla\CMS\MVC\Model\ListModel;

class HtmlView extends BaseHtml
{
    protected $items;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        parent::display($tpl);
    }

    public function getItems()
    {
        $model = new \Fox5\Component\News\Site\Model\ListModel();
        return $model->getItems();

    }
}