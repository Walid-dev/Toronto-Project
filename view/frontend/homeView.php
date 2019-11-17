<?php ob_start(); ?>
<section id="part1" class="part1">
    <?= sliderHeader(); ?>
</section>
<section>
    <?= meteoBanner(); ?>
</section>
<section class="part2">
    <?= mapSection(); ?>
</section>
<section id="part3" class="part3">
    <?= addPostTest(); ?>
</section>
<section id="part4" class="part4">
    <?= articleSection(); ?>
</section>
<section id="part5">
    <?= addPost(); ?>

</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>