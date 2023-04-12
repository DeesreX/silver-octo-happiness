<?php

namespace Fox5\Component\News\Administrator\Model;

use Fox5\Component\News\Administrator\Table\NewschangelogTable;
use Fox5\Component\News\Administrator\Table\NewsTable;
use Joomla\CMS\MVC\Model\FormModel;
use Joomla\Database\DatabaseDriver;
use Joomla\DI\Container;
use Joomla\Input\Input;
use Lcobucci\JWT\Claim\Factory;

class NewsFormModel extends FormModel
{
    private $comDbo = null;

    public function __construct()
    {
        $this->_db = $this->setComDb();
    }


    protected $item;

    public function setComDb()
    {
        $container = new Container;

        $options = array();
        $options['database'] = 'news';
        $options['user'] = 'dev';
        $options['password'] = '112233445566';

        return DatabaseDriver::getInstance($options);
    }

    public function getForm($data = array(), $loadData = true)
    {
        // Get the form object.
        $form = $this->loadForm('com_news.newsform', 'newsform', array('control' => 'jform', 'load_data' => $loadData));

        if (!$form) {
            return false;
        }

        // Return the form object.
        return $form;
    }

    public function saveForm($data)
    {
        $input = new Input();
        $db = $this->_db;
        $newsTable = new NewsTable($db);
        $newsChangelogTable = new NewschangelogTable($db);
        $editorText = $input->getPost('mytextarea', '', 'raw');
        $data['text'] = $editorText;

        if (isset($data['catid'])) {
            $data['category_id'] = $data['catid'];
        }
        if (isset($data['status'])) {
            $data['publish'] = $data['status'];
        }

        // Check if the record is new or being updated
        $isNew = empty($data['id']);

        // Perform any necessary actions before storing the record
        if (!$isNew) {
            // Get the old record
            $oldRecord = new NewsTable($db);
            $oldRecord->load($data['id']);

            // Create a new changelog entry
            $changelogData = array(
                'news_id' => $oldRecord->id,
                'user_id' => $oldRecord->user,
                'old_title' => $oldRecord->title,
                'new_title' => $data['title'],
                'old_text' => $oldRecord->text,
                'new_text' => $data['text'],
                'edit_date' => Factory::getDate()->toSql()
            );
        }

        if (!$newsTable->save($data)) {
            die(print_r($newsTable->getErrors()));
        }

        // Save the changelog entry if the record is not new
        if (!$isNew) {
            if (!$newsChangelogTable->save($changelogData)) {
                die(print_r($newsChangelogTable->getErrors()));
            }
        }
    }

    public function getData()
    {
        $table = new NewsTable($this->_db);
        $table->load();
        return $table->getItems();
    }
}