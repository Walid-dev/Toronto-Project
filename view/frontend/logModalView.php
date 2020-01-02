<div id="dropdownNavbar" class="dropdown">
    <button id="menuLink" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu
        <img class="order-2 ml-2" src="public/images/menu.png" width="25" alt="menu icon">
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <li class="nav_link_box">
            <a class="nav_section_link d-flex align-items-center" href="index.php?action=dashboard">
                <img class="m-2" src="public/images/house.png" alt="" width="20" />Tableau de bord
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link d-flex align-items-center" href="index.php?action=getMessage">
                <img class="m-2" src="public/images/admin.png" alt="" width="20" />Messagerie
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link d-flex align-items-center" href="index.php?action=addPost">
                <img class="m-2" src="public/images/add-file.png" alt="" width="20" />Ajouter
            </a>
        </li>
        <form class="form" action="index.php" method="post">
            <button class="dropdown-item logout-btn" type="submit" name="logout-submit"><img class="mr-2" src="public/images/logout.png" width="20" alt="map icon">Logout</button>
        </form>
</div>