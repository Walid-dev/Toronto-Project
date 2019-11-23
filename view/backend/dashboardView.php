<?php ob_start(); ?>
<div class="container-fluid">
    <div class="dashboard p-3">
        <div class="dashboard_header">
            <h3>Tableau de bord</h3>
            <img class="dashboard_pp" src="public/images/img4.jpg" width="100" height="100" alt="">
        </div>
        <div class="dashboard_main_content">
            <div class="dashboard_article_list">
                <h5 class="text-center m-4">Mes Articles</h5>




                <?php
                while ($dashboardArticle = $dashboardArticles->fetch()) {
                    ?>

                    <div class="dashboard_btn_box mt-2">
                        <div class="dashboard_article_title"><?= $dashboardArticle['title'] ?></div>
                        <?= '<img class="img-fluid mt-3 ml-2" src="data:image/jpeg;base64,' . $dashboardArticle['image'] . '" width="60" />' ?>
                        <a class="btn btn-warning mt-3 ml-2" href="index.php?action=post&amp;id=<?= $dashboardArticle['id'] . "#postContainer" ?>">Lire</a>
                        <a href="" class="btn admin_btn mt-2" data-toggle="modal" data-target="#exampleModalCenter<?= $dashboardArticle['id'] ?>">
                            Supprimer article
                        </a>
                        <br>
                        <span class="dashboard_article_date mt-2">Le <?= $dashboardArticle['creation_date_fr'] ?></span>




                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter<?= $dashboardArticle['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content deleteModalContent">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Supprimer article</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>L'article est sur le point d'etre définitivement supprimer.<br>Confirmer la suppression ?</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <a href="index.php?action=delete&amp;id=<?= $dashboardArticle['id'] ?>" class="btn btn-danger">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                <?php
            }
            $dashboardArticles->closeCursor();
            ?>





            </div>
            <div class="dashboard_add_list">
                <h5 class="text-center m-4">Mes Annonces</h5>
                <div class="dashboard_btn_box mb-3">
                    <a class="btn btn-warning mt-2" href="">Premier article</a>
                    <a href="" class="btn btn-danger mt-2">Effacer</a>
                </div>
                <div class="dashboard_btn_box mb-3">
                    <a class="btn btn-warning mt-2" href="">Premier article</a>
                    <a href="" class="btn btn-danger mt-2">Effacer</a>
                </div>
                <div class="dashboard_btn_box mb-3">
                    <a class="btn btn-warning mt-2" href="">Premier article</a>
                    <a href="" class="btn btn-danger mt-2">Effacer</a>
                </div>
                <div class="dashboard_btn_box mb-3">
                    <a class="btn btn-warning mt-2" href="">Premier article</a>
                    <a href="" class="btn btn-danger mt-2">Effacer</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>