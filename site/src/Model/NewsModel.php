<?php
namespace Fox5\Component\News\Site\Model;

use Fox5\Component\News\Site\Table\NewsTable;
use Joomla\CMS\MVC\Model\ItemModelInterface;
use Joomla\CMS\MVC\Model\ListModel;
use Joomla\CMS\Table\Table;

class NewsModel extends ListModel implements ItemModelInterface
{
    protected $table;
    public function __construct(array $config = array())
    {
        parent::__construct($config);
        $this->table = new NewsTable($this->_db);
    }

    public function getItem($pk = null)
    {
        if ($pk === null) {
            $pk = $this->getState('item.id');
        }

        $table = $this->getTable();

        if (!$table->load($pk)) {
            throw new \RuntimeException(sprintf('Unable to load row with ID: %s', $pk));
        }

        return $table;
    }

    public function getItems()
    {
        return $this->table->getListQuery();
    }
}