<?php 

namespace Fox5\Component\News\Administrator\Table;
defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

class NewsTable extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct('news', 'id', $db);
    }

    public function getItems()
    {
        $query = $this->_db->getQuery(true);

        $query->select('*');
        $query->from($this->_tbl);

        $this->_db->setQuery($query);
        
        return $this->_db->loadObjectList();
    }
}
