<?php
namespace Fox5\Component\News\Site\View\News;

use Fox5\Component\News\Administrator\Model\NewsFormModel;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

defined('_JEXEC') or die;


class HtmlView extends BaseHtmlView
{
    public function display($tpl = null): void
    {
        parent::display($tpl);
    }

    public function getData(){
        $model = new NewsFormModel();
        return $model->getData();
    }

}
