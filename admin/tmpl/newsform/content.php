<?php
// This will look similar to articles content tab.
use Joomla\CMS\HTML\HTMLHelper;
// I need a text editor on the left and [status, category, Featured, Tags, Note, Version Note] on the right
?>

<div class="row">
  <div class="col-md-8">
    <?php echo JHtml::_('content.editor', 'text', '', '100%', '400', '20', '20', true ); ?>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label><?php echo JText::_('JSTATUS'); ?></label>
      <?php echo JHtml::_('select.genericlist', $status_options, 'status', null, 'value', 'text', $item->state, 'jform_state', true ); ?>
    </div>
    <div class="form-group">
      <label><?php echo JText::_('JCATEGORY'); ?></label>
      <?php echo JHtml::_('category.category', 'jform[catid]', $item->catid, array('extension'=>'com_content')); ?>
    </div>
    <div class="form-group">
      <label><?php echo JText::_('JFEATURED'); ?></label>
      <?php echo JHtml::_('select.booleanlist', 'jform[featured]', null, $item->featured, 'COM_CONTENT_FEATURING'); ?>
    </div>
    <div class="form-group">
      <label><?php echo JText::_('JTAGS'); ?></label>
      <?php echo JHtml::_('content.tag', $item->id, $item->tags); ?>
    </div>
    <div class="form-group">
      <label><?php echo JText::_('JNOTE'); ?></label>
      <?php echo JHtml::_('textarea', 'jform[note]', $item->note, array('class'=>'form-control')); ?>
    </div>
    <div class="form-group">
      <label><?php echo JText::_('JVERSION_NOTE'); ?></label>
      <?php echo JHtml::_('textarea', 'jform[version_note]', $item->version_note, array('class'=>'form-control')); ?>
    </div>
  </div>
</div>
