<header class="page-header">
    <?php if ($subtitle || $title): ?>
        <div class="page-header__top">
            <div class="container">
                <?php if ($subtitle): ?>
                    <div class="page-header__subtitle"><?php echo $subtitle; ?></div>
                <?php endif ?>

                <?php if ($title): ?>
                    <h1 class="page-header__title"><?php echo $title; ?></h1>
                <?php endif ?>
            </div>
        </div>
    <?php endif ?>
    <?php if ($perex): ?>
        <div class="page-header__bottom">
            <div class="container">

                <?php if ($perex): ?>
                    <div class="page-header__perex apply-formatting">
                        <?php echo $perex; ?>
                    </div>
                <?php endif ?>

                <?php if ($meta): ?>
                    <ul class="meta page-header__meta">
                        <li class="meta__item"><?php echo $meta; ?></li>
                    </ul>
                <?php endif ?>

            </div>
        </div>
    <?php endif ?>
</header>