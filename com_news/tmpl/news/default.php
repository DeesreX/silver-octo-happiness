<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_profile
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\WebAsset\WebAssetManager;
use Fox5\Component\Profile\Administrator\View\Profile\HtmlView;

/** @var HtmlView $this */

/** @var WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
$wa->useScript('keepalive')
	->useScript('form.validate');

HTMLHelper::_('script', 'com_profile/admin-profiles-letter.js', array('version' => 'auto', 'relative' => true));

$app                    = Factory::getApplication();
$input                  = $app->input;
$assoc                  = Associations::isEnabled();
$this->ignore_fieldsets = ['item_associations'];
$this->useCoreUI        = true;

$container = Factory::getContainer();
$session = $container->get(\Joomla\Session\SessionInterface::class);
$session -> set("media.profile_id", $this->item->id);

// In case of modal
$isModal = $input->get('layout') == 'modal' ? true : false;
$layout  = $isModal ? 'modal' : 'edit';
$tmpl    = $isModal || $input->get('tmpl', '') === 'component' ? '&tmpl=component' : '';

$form  = $this->form;
?>
<pre>
    <?php //print_r($form) ?>
    <?php //echo Route::_('index.php?option=com_profile&layout=' . $layout . $tmpl . '&id=' . (int) $this->item->id); ?>
</pre>
<form action="<?php echo Route::_('index.php?option=com_profile&layout=' . $layout . $tmpl . '&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="profile-form" class="form-validate">

    <div class="row title-alias form-vertical mb-3">
        <div class="col-12 col-md-6">
            <h1><?php echo $this->item->title .' '. $this->item->name .' '. $this->item->surname; ?></h1>
        </div>
        <div class="col-12 col-md-6">
            <?php
            if (true) {
                $form->setFieldAttribute('alias', 'readonly', 'readonly');
            }
            ?>
            <?php echo $form->renderField('alias'); ?>
        </div>
    </div>




<div class="main-card">
    <?php echo HTMLHelper::_('uitab.startTabSet', 'profileTab', ['active' => 'Memberships', 'recall' => true, 'breakpoint' => 768]); ?>

    <?php echo HTMLHelper::('uitab.addTab', 'profileTab', 'general', Text::('Profile')); ?>
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                    <fieldset class="adminform">
                        <?php echo $this->getForm()->renderField('title'); ?>
                        <?php echo $this->getForm()->renderField('name'); ?>
                        <?php echo $this->getForm()->renderField('surname'); ?>
                    </fieldset>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
            <div>
                Profile
                <?php echo $this->form->getInput('text'); ?>
            </div>
        </div>
        <div class="col-lg-3">
            <?php echo LayoutHelper::render('joomla.edit.global', $this); ?>
        </div>
    </div>

    <?php echo HTMLHelper::_('uitab.endTab'); ?>

    <?php echo HTMLHelper::('uitab.addTab', 'profileTab', 'ProfileImages', Text::('Profile images')); ?>
    <div class="row">
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-publishingdata" class="options-form">
                <legend>Image</legend>
                <div>
                    <div><?php // TODO echo profile image instructions from component config perams ?></div>
                    <?php echo $this->getForm()->renderField('photo'); ?>

                    <?php echo $this->getForm()->renderField('profile_image_caption'); ?>
                    <?php echo $this->getForm()->renderField('hide_photo'); ?>
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-lg-6">
                <img src="<?php echo $this->item->photo;?>" />
        </div>
    </div>
    <?php echo HTMLHelper::_('uitab.endTab'); ?>

    <?php echo HTMLHelper::('uitab.addTab', 'profileTab', 'ContactBiographical', Text::('Contact & Biographical')); ?>
    <div class="row">
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-publishingdata" class="options-form">
                <legend>Contact information</legend>
                <div>
                    <?php if (true) {
                        echo $this->getForm()->renderFieldset('contact');
                    } ?>
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-publishingdata" class="options-form">
                <legend>Biographical data</legend>
                <div>
                    <?php echo $this->getForm()->renderFieldset('biographical'); ?>
                </div>
            </fieldset>
        </div>
    </div>
    <?php echo HTMLHelper::_('uitab.endTab'); ?>

    <?php echo HTMLHelper::('uitab.addTab', 'profileTab', 'Work', Text::('My Work')); ?>
    <div class="row">
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-publishingdata" class="options-form">
                <legend>Work</legend>
                <div>
                    <?php if (true) {
                        echo $this->getForm()->renderFieldset('work');
                    } ?>
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-publishingdata" class="options-form">
                <legend>Fields of expertise</legend>
                <div>
                    <?php echo $this->getForm()->renderFieldset('expertise'); ?>
                </div>
            </fieldset>
        </div>
    </div>
    <?php echo HTMLHelper::_('uitab.endTab'); ?>

    <?php /*echo HTMLHelper::('uitab.addTab', 'profileTab', 'links-media', Text::('Links & Social media')); ?>
    <div class="row">
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-publishingdata" class="options-form">
                <legend>Links</legend>
                <div>
                    <?php echo $this->getForm()->renderFieldset('link'); ?>
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-publishingdata" class="options-form">
                <legend>Social media</legend>
                <div>
                    <?php echo $this->getForm()->renderFieldset('social_media'); ?>
                </div>
            </fieldset>
        </div>
    </div>
    <?php echo HTMLHelper::_('uitab.endTab');*/ ?>

    <?php echo HTMLHelper::('uitab.addTab', 'profileTab', 'Memberships', Text::('Membership')); ?>
    <div class="row">
        <div class="col-6 col-lg-6">
            <fieldset id="memberships" class="options-form">
                <?php
                $memberships = $this->getForm()->getField('memberships');
                ?>
                <pre>
                    <?php //print_r($memberships) ?>
                    <?php echo get_class($memberships) ?>
                    <?php print_r(get_class_methods($memberships)) ?>
                    <?php print_r(get_object_vars($memberships)) ?>
                </pre>
                <legend>Memberships</legend>
                <div>
                    <?php echo LayoutHelper::render('fox5.hub.membership', $this); ?>
                    <?php //echo $this->getForm()->renderFieldset('Memberships'); ?>
                </div>
            </fieldset>
        </div>
        <div class="col-6 col-lg-6">
            <fieldset id="Seniority Dates" class="options-form">
                <legend>Seniority</legend>
                <div>
                    <?php if (true) {
                        echo $this->getForm()->renderFieldset('seniority_dates');
                    } ?>
                </div>
            </fieldset>

        </div>
    </div>
    <?php echo HTMLHelper::_('uitab.endTab'); ?>

    <?php // Do not show the publishing options if the edit form is configured not to. ?>

    <?php /*echo HTMLHelper::('uitab.addTab', 'profileTab', 'publishing', Text::('Publishing')); ?>
    <div class="row">
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-publishingdata" class="options-form">
                <legend>Publishing</legend>
                <div>
                    <?php echo LayoutHelper::render('joomla.edit.publishingdata', $this); ?>

                </div>

                <?php echo $this->getForm()->renderFieldset('publishingdata'); ?>
            </fieldset>
        </div>
        <div class="col-12 col-lg-6">
            <fieldset id="fieldset-metadata" class="options-form">
                <legend><?php echo Text::_('JGLOBAL_FIELDSET_METADATA_OPTIONS'); ?></legend>
                <div>
                    <?php echo LayoutHelper::render('joomla.edit.metadata', $this); ?>
                </div>
            </fieldset>
        </div>
    </div>
    <?php echo HTMLHelper::_('uitab.endTab');*/ ?>

    <?php /*echo HTMLHelper::('uitab.addTab', 'profileTab', 'editor', Text::('Configure Edit Screen')); ?>
    <fieldset id="fieldset-editor" class="options-form">
        <legend><?php echo Text::_('Configure Edit Screen'); ?></legend>
        <div class="form-grid">
            <?php echo $this->form->renderFieldset('editorConfig'); ?>
        </div>
    </fieldset>
    <?php echo HTMLHelper::_('uitab.endTab'); */?>

    <?php /*echo HTMLHelper::('uitab.addTab', 'profileTab', 'files', Text::('Files')); ?>

    <fieldset id="fieldset-rules" class="options-form">
        <legend><?php echo Text::_('Files'); ?></legend>
        <div>
            <?php echo $this->form->renderFieldset('files'); ?>
        </div>
    </fieldset>
    <?php echo HTMLHelper::_('uitab.endTab');*/ ?>

    <?php /*echo HTMLHelper::('uitab.addTab', 'profileTab', 'permissions', Text::('Permissions')); ?>
    <fieldset id="fieldset-rules" class="options-form">
        <legend><?php echo Text::_('Permissions'); ?></legend>
        <div>
            <?php echo $this->form->getInput('rules'); ?>
        </div>
    </fieldset>
    <?php echo HTMLHelper::_('uitab.endTab');*/ ?>

    <?php /*echo HTMLHelper::('uitab.addTab', 'profileTab', 'permissions', Text::('Popia compliance')); ?>
    <?php //TODO show popia compliance information ?>
    <?php echo HTMLHelper::_('uitab.endTab'); */ ?>

    <?php echo HTMLHelper::_('uitab.endTabSet'); ?>

    <?php // Creating 'id' hiddenField to cope with com_associations sidebyside loop ?>
    <?php if (true) : //$params->get('show_publishing_options', 1) == 0 ?>
        <?php $hidden_fields = $this->form->getInput('id'); ?>
        <div class="hidden"><?php echo $hidden_fields; ?></div>
    <?php endif; ?>

    <input type="hidden" name="task" value="">
    <input type="hidden" name="return" value="<?php echo $input->getBase64('return'); ?>">
    <input type="hidden" name="forcedLanguage" value="<?php echo $input->get('forcedLanguage', '', 'cmd'); ?>">
    <?php echo HTMLHelper::_('form.token'); ?>
</div>
</form>