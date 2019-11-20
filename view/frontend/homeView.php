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
    <?php
    if (isset($_POST['upload'])) {
        // The path to store the upladed imageé2
        $target = "images/" . basename($_FILES['image']['name']);
        // Connect to the database
        $db = new PDO('mysql:host=localhost;dbname=photos;charset=utf8', 'root', 'root');
        return $db;
        // GET all the submitted data from the form
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];

        $sql = $db->prepare("INSERT INTO images (image, text) VALUES ('$image' , '$text");
        $sql->execute(array($image, $text));

        return $sql;

        // let's move the uploaded images to the images folder
    }
    ?>



    <form id="formTest" action="index.php" enctype="multipart/form-data" method="post" class="">
        <input type="hidden" name="size" value="1000000">
        <div class="form-group">
            <input type="file" name="image">
            <br>
            <textarea name="text" id="" cols="40" rows="4" placeholder="Say something about the picture..."></textarea>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" name="upload" value="Upload Image">Upload</button>
        </div>
    </form>
</section>

<section id="part5">

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>