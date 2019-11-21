<?php ob_start(); ?>
<section id="part1" class="part1">
    <?= sliderHeader() ?>
    <?= meteoBanner() ?>

</section>
<section class="part2">
    <?= mapSection() ?>
</section>
<section id="part3" class="part3">
    <?= articleSection() ?>
</section>

<section id="part4" class="part4">

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>