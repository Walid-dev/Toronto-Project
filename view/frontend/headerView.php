<nav id="navHeader">
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <ul class="nav-links">
        <li id="logo_link" class="mr-5"><a href="index.php"><img src="public/images/toronto_logo.png" width="120" alt=""></a></li>
        <?= displayModal("Connection"); ?>
        <li><a class="nav_section_link" href="index.php#bodyTop">Accueil</a></li>
        <li><a class="nav_section_link" href="index.php#mapSection">Carte</a></li>
        <li><a class="nav_section_link" href="index.php#articlesSection">Article</a></li>
        <li><a class="nav_section_link" href="index.php#part4">Annonces</a></li>
        <li><a class="nav_section_link" href="index.php?action=getMessage">Message</a></li>
    </ul>
</nav>


<!--Modal: Login / Register Form-->