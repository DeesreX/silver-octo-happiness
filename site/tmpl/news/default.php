<?php

$data = $this->getData();

?>
<h1><?php echo $this->escape($data[0]->title); ?></h1>
<p><?php echo $this->escape($data[0]->intro_text); ?></p>
<p><?php echo $this->escape($data[0]->text); ?></p>
<p><?php echo $this->escape($data[0]->date); ?></p>
<p><?php echo $this->escape($data[0]->tags); ?></p>

