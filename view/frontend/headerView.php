<nav id="navHeader">
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <ul class="nav-links">
        <li id="logo_link"><a href=""><img src="public/images/toronto_logo.png" width="120" alt=""></a></li>
        <li><a class="nav_section_link" href="#bodyTop">Accueil</a></li>
        <li><a class="nav_section_link" href="#part2">Courses</a></li>
        <li><a class="nav_section_link" href="#part3">Content</a></li>
        <li><a class="nav_section_link" href="#part4">Projects</a></li>
        <li class="dropdown">
            <a class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ajouter
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="index.php?action=addPost" class="dropdown-item" type="button">Article</a>
                <a class="dropdown-item" type="button">Annonce</a>
                <a class="dropdown-item" type="button">Autre</a>
            </div>
        </li>
        <li><?= displayModal(); ?></li>
    </ul>
</nav>


<!--Modal: Login / Register Form-->