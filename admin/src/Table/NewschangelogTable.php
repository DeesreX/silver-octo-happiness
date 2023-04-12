<?php 

namespace Fox5\Component\News\Administrator\Table;
defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

class NewschangelogTable extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct('news_changelog', 'id', $db);
    }


    public function getItems()
    {
        $query = $this->_db->getQuery(true);

        $query->select('*');
        $query->from($this->_tbl);

        $this->_db->setQuery($query);
        
        return $this->_db->loadObjectList();
    }

    public function store($updateNulls = false)
    {
        // Check if the record is new or being updated
        $isNew = $this->id == 0;

        // Perform any necessary actions before storing the record
        if ($isNew) {
            // Create an initial changelog entry, if desired
        } else {
            // Update the existing records and create a new changelog entry
        }

        // Call the parent store method to save the record
        return parent::store($updateNulls);
    }
}
