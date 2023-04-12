<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Editor\Editor;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Form\Form;

$editor = Editor::getInstance('codemirror');
$text = "";
$config = "width='700px'";
HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');
HTMLHelper::_('bootstrap.tab');

$newsForm = new Form('article', ['control' => 'form']);
$newsForm->loadFile(JPATH_ADMINISTRATOR . '/components/com_content/forms/article.xml');


$wa = $this->document->getWebAssetManager();
$wa->useScript('keepalive')
    ->useScript('form.validate');

$document = Factory::getDocument();
$document->addScriptDeclaration('
    Joomla.submitbutton = function(task) {
        if (task == "yourcomponent.cancel" || document.formvalidator.isValid(document.getElementById("adminForm"))) {
            Joomla.submitform(task, document.getElementById("adminForm"));
        } else {
            alert("' . $this->escape(Text::_('JGLOBAL_VALIDATION_FORM_FAILED')) . '");
        }
    };
');
?>

<?php
$document->addScriptDeclaration('
    document.addEventListener("DOMContentLoaded", function() {
        var myTabs = document.getElementById("myTab");
        var editor;
        myTabs.addEventListener("shown.bs.tab", function(event) {
            var tabName = event.target.getAttribute("href").replace("#", "");
            if (tabName == "content") {
                if (!editor) {
                    editor = CodeMirror.fromTextArea(document.getElementById("mytextarea"), ' . json_encode($config) . ');
                }
            }
        });
    });
');
?>

<form action="<?php echo 'index.php?option=com_news&controller=news&task=save' ?>" method="post" name="adminForm"
    id="adminForm" class="form-validate">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'content')); ?>

                    <?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'content', Text::_('Content', true)); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <label>News Content</label>
                            <?php echo $editor->display('mytextarea', $text, '100%', '600px', '20', '10', true, null, $config); ?>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Basic Info</label>
                            <?php echo $this->form->renderFieldset('news_details') ?>
                        </div>
                        <div class="col-md-6">
                        <label>Publishing</label>
                            <?php echo $this->form->renderFieldset('status_form') ?>

                        </div>
                    </div>

                    <?php echo HTMLHelper::_('uitab.endTab'); ?>

                    <?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'images_links', Text::_('Images and Links', true)); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="options-form">
                                <legend>Intro Image</legend>
                                <?php echo $this->form->renderFieldset('intro_images'); ?>
                            </fieldset>
                            <fieldset class="options-form">
                                <legend>Full News Image</legend>
                                <?php echo $this->form->renderFieldset('full_news_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="options-form">
                                <legend>Link A</legend>
                                <?php echo $this->form->renderFieldset('linka'); ?>
                            </fieldset>
                            <fieldset class="options-form">
                                <legend>Link A</legend>
                                <?php echo $this->form->renderFieldset('linkb'); ?>
                            </fieldset>
                            <fieldset class="options-form">
                                <legend>Link A</legend>
                                <?php echo $this->form->renderFieldset('linkc'); ?>
                            </fieldset>
                        </div>
                    </div>
                    <?php echo HTMLHelper::_('uitab.endTab'); ?>

                    <?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'options', Text::_('Options', true)); ?>
                    <fieldset class="options-form">
                        <legend>Layout</legend>
                        <?php echo $this->form->renderFieldset('basic'); ?>
                    </fieldset>
                    <fieldset class="options-form">
                        <legend>Category</legend>
                        <?php echo $this->form->renderFieldset('category'); ?>
                    </fieldset>
                    <fieldset class="options-form">
                        <legend>Author</legend>
                        <?php echo $this->form->renderFieldset('author'); ?>
                    </fieldset>
                    <fieldset class="options-form">
                        <legend>Date</legend>
                        <?php echo $this->form->renderFieldset('date'); ?>
                    </fieldset>
                    <fieldset class="options-form">
                        <legend>Options</legend>
                        <?php echo $this->form->renderFieldset('other'); ?>
                    </fieldset>
                    <?php echo HTMLHelper::_('uitab.endTab'); ?>

                    <?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'publishing', Text::_('Publishing', true)); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="options-form">
                                <legend>Publishing</legend>
                                <?php echo $this->form->renderFieldset('publishingdata'); ?>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="options-form">
                                <legend>Meta Data</legend>
                                <?php echo $this->form->renderFieldset('metadata'); ?>
                            </fieldset>
                        </div>
                    </div>
                    <?php echo HTMLHelper::_('uitab.endTab'); ?>

                    <?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'permissions', Text::_('Permissions', true)); ?>
                    <fieldset class="options-form">
                        <legend>Permissions</legend>
                        <?php echo $this->form->renderFieldset('permissions'); ?>
                    </fieldset>
                    <?php echo HTMLHelper::_('uitab.endTab'); ?>
                    <?php echo HTMLHelper::_('uitab.endTabSet'); ?>

                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="task" value="news" />
    <?php echo JHtml::_('form.token'); ?>
</form>