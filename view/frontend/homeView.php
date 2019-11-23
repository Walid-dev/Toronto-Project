<?php ob_start(); ?>
<section id="part1" class="part1">
    <?= sliderHeader() ?>
    <?= meteoBanner() ?>

</section>
<section id="mapSection" class="part2">
    <?= mapSection() ?>
</section>
<section id="articlesSection" class="part3">
    <?= articleSection() ?>
</section>
<section id="addsSection" class="part3">
    <?= addsSection() ?>
</section>



<section id="part4" class="part4">

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>