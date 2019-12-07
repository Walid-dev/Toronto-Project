<nav id="navHeader">
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <ul class="nav-links mr-5">
        <li id="logo_link" class="mr-5"><a href="index.php"><img id="logo" src="public/images/toronto_logo.png" width="120" alt="toronto logo"></a></li>
        <?= displayModal("Connection"); ?>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#bodyTop">
                Accueil<img class="ml-2" src="public/images/house.png" alt="" />
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#mapSection">
                Carte<img class="ml-2" src="public/images/map.png" alt="" />
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#articlesSection">
                Artciles<img class="ml-2" src="public/images/gazette.png" alt="" />
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#addSection">
                Annonces<img class="ml-2" src="public/images/loudspeaker.png" alt="" />
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#bodyTop">
                Contacts<img class="ml-2" src="public/images/email.png" alt="" />
            </a>
        </li>
    </ul>
</nav>


<!--Modal: Login / Register Form-->