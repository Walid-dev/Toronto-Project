<!-- Footer -->
<footer id="myFooter">
    <div class="container-fluid">
        <div class="row">
            <div class="">
                <h5>Navigation</h5>
                <ul>
                    <li><a href="#page-top">Accueil</a></li>
                    <li><a href="#about">A Propos De Moi</a></li>
                    <li><a href="#skills">Compétences</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#social">Social</a></li>
                </ul>
            </div>
            <div class="">
                <h5>Mes Projets</h5>
                <ul>
                    <li><a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">Premier Site HTML/CSS</a></li>
                    <li><a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">Premier Site Wordpress</a></li>
                    <li><a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">Premier Test Bootstrap</a></li>
                    <li><a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">Premier Site Perso</a></li>
                    <li><a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">Site Wordpress</a></li>
                </ul>
            </div>
            <div class="">
                <h5>Contact</h5>



                <form id="formFooter" action="send.php" method="POST" class=".is-validated mt-3">
                    <div class="form-group d-flex mb-2">
                        <input type="text" class="form-control" id="pwd" placeholder="Nom" name="myName" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        <input type="email" class="form-control ml-2" placeholder="Email" name="myEmail" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="uname" placeholder="Message" name="myMessage" required></textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                            <button type="submit" value="Send" class="btn btn-blue ml-1">Envoyer</button>
                        </label>
                    </div>
                </form>




                <!--   <form method="get" action="mailto:hlaliwalid@gmail.com">
                    <button class="btn" type="submit">Contact Mail</button>
                </form>
-->
            </div>
        </div>
        <ul id="socialFooterBox" class="ul-social-footer">
            <li>
                <a href="#">
                    <i class="linkedin fab fa-linkedin" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="git-hub fab fa-github" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="public/images/malt.png" alt="" width="31">
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="twitter fab fa-twitter" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="mailto:hlaliwalid@gmail.com">
                    <img src="public/images/gmail.png" alt="" width="32"><img>
                </a>
            </li>
        </ul>
        <div class="loader_box mt-3">
            <a class="nav-link" href="#bodyTop">
                <div class="loader mx-auto">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </div>

        <div class="footer-copyright">
            <p>© 2018 Galaxysurfing.com </p>
        </div>
    </div>

</footer>