<?php
use Joomla\CMS\Factory;

defined('_JEXEC') or die;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/css/jquery.dataTables.min.css">

<div class="table-responsive">
    <table id="news-table" class="table table-striped">
        <thead>
            <tr>
                <th>
                    <?php echo JText::_('COM_NEWS_ID'); ?>
                </th>
                <th>
                    <?php echo JText::_('COM_NEWS_TITLE'); ?>
                </th>
                <th>
                    <?php echo JText::_('COM_NEWS_CATEGORY'); ?>
                </th>
                <th>
                    <?php echo JText::_('COM_NEWS_AUTHOR'); ?>
                </th>
                <th>
                    <?php echo JText::_('COM_NEWS_DATE'); ?>
                </th>
                <th>
                    <?php echo JText::_('COM_NEWS_STATUS'); ?>
                </th>
                <th>
                    <?php echo JText::_('COM_NEWS_HITS'); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->getItems() as $item): ?>
                <tr>
                    <td>
                        <?php echo $item->id; ?>
                    </td>
                    <td>
                        <?php echo $item->title; ?>
                    </td>
                    <td>
                        <?php echo $item->catid; ?>
                    </td>
                    <td>
                        <?php echo $item->author_id; ?>
                    </td>
                    <td>
                        <?php echo JHtml::_('date', $item->date, 'd M Y'); ?>
                    </td>
                    <td>
                        <?php echo $item->state ? JText::_('COM_NEWS_PUBLISHED') : JText::_('COM_NEWS_UNPUBLISHED'); ?>
                    </td>
                    <td>
                        <?php echo $item->hits; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/js/jquery.dataTables.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $('#news-table').dataTable({

        });
    });
</script>

<style>
    table {
        width: 100%;
    }

    th,
    td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>