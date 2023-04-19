<?php

namespace Fox5\Component\News\Site\Table;

use Joomla\CMS\Table\Table;

class NewsTable extends Table
{
    public function __construct($db)
    {
        parent::__construct('#__news', 'id', $db);
    }

    public function getListQuery()
    {
        $query = $this->getDbo()->getQuery(true);
    
        $query->select('*')
              ->from('#__news');
        
        $this->_db->setQuery($query);
        return $this->_db->loadObjectList();
    }

}