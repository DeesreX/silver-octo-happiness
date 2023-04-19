<div class="container">
    <div class="row">
        <?php foreach ($this->items as $item) : ?>
        <div class="col-md-4">
            <div class="card mb-4 h-100">
                <img src="<?php echo $item->intro_image; ?>" class="card-img-top" alt="<?php echo $item->title; ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $item->title; ?></h5>
                    <p class="card-text flex-grow-1"><?php echo $item->intro_text; ?></p>
                    <a href="<?php echo $item->link; ?>" class="btn btn-primary mt-auto">Read More</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
