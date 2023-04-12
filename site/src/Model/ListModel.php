<?php

namespace Fox5\Component\News\Site\Model;

use Joomla\CMS\MVC\Model\ListModel as LModel;
use Joomla\Database\DatabaseDriver;
use Joomla\DI\Container;

class ListModel extends LModel
{
    public function __construct(){
        $this->_db = $this->setComDb();
    }

    protected function getListQuery()
    {

        $query = $this->_db->getQuery(true);
        $query->select('*')
            ->from($this->_db->quoteName('news'));

        return $query;
    }

    public function getItems()
    {
        $table = new \Fox5\Component\News\Administrator\Table\NewsTable($this->_db);
        $table->load();
        return $table->getItems();
    }

    public function setComDb()
    {
        $container = new Container;

        $options = array();
        $options['database'] = 'news';
        $options['user'] = 'dev';
        $options['password'] = '112233445566';

        return DatabaseDriver::getInstance($options);
    }
}