<?php ob_start(); ?>
<section id="bannerSection" class="part1">
    <?= bannerSection(); ?>
</section>

<section id="articleSection" class="part3">
    <div class="container">
        <?= articleSection() ?>
    </div>
</section>
<div id="meteoSection">
    <?= meteoBanner() ?>
</div>
<section id="addSection" class="part3">
    <div class="container">
        <?= addsSection() ?>
    </div>
</section>
<section id="mapSection" class="part2">
    <div class="container-fluid">
        <?= mapSection() ?>
    </div>
</section>
<!--
<div id="animationCyberTruck">
    <div class="anime_box">
        <div class="cybertruck_box">
            <hr class="cybertruck_neon">
            <img class="cybertruck" src="https://media.giphy.com/media/ii7cgh1hcUYaMEb45y/giphy.gif" width="200px" alt="">
        </div>
        <img class="street-lamp" src="public/images/street-lamp.png" width="120px" alt="">
    </div>
</div>
-->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>