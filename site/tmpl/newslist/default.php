<?php 
$items = $this->getItems();
?>
<ul>
    <?php foreach ($items as $item) : ?>
        <li>
            <h2><?php echo $item->title; ?></h2>
            <p><?php echo $item->intro_text; ?></p>
            <a href="<?php echo JRoute::_('index.php?option=com_news&view=article&id=' . $item->id); ?>">Read More</a>
        </li>
    <?php endforeach; ?>
</ul>