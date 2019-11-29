<nav id="navHeader">
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <ul class="nav-links">
        <li id="logo_link" class="mr-5"><a href="index.php"><img src="public/images/toronto_logo.png" width="120" alt="toronto logo"></a></li>
        <?= displayModal("Connection"); ?>
        <a class="nav_section_link" href="index.php#bodyTop">
            <li class="nav_link_box"><img class="mr-2" src="public/images/house.png" width="25" alt="map icon"><a class="nav_section_link" href="index.php#mapSection">Accueil</a></li>
        </a>
        <a class="nav_section_link" href="index.php#bodyTop">
            <li class="nav_link_box"><img class="mr-2" src="public/images/map.png" width="25" alt="map icon"><a class="nav_section_link" href="index.php#mapSection">Carte</a></li>
        </a>
        <a class="nav_section_link" href="index.php#bodyTop">
            <li class="nav_link_box"><img class="mr-2" src="public/images/gazette.png" width="20" alt="articles icon"><a class="nav_section_link" href="index.php#articlesSection">Articles</a></li>
        </a>
        <a class="nav_section_link" href="index.php#bodyTop">
            <li class="nav_link_box"><img class="mr-2" src="public/images/loudspeaker.png" width="22" alt=""><a class="nav_section_link" href="index.php#addSection">Annonces</a></li>
        </a>
        <a class="nav_section_link" href="index.php#bodyTop">
            <li class="nav_link_box"><img class="mr-2" src="public/images/email.png" width="25" alt=""><a class="nav_section_link" href="index.php#contacts">Contacts</a></li>
        </a>
    </ul>
</nav>


<!--Modal: Login / Register Form-->