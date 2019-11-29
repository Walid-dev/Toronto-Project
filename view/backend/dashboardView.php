<?php ob_start(); ?>
<div class="container-fluid p-4">
    <div class="img_title-box text-center">
        <img class="text-center" src="public/images/dashboard.png" width="180" alt="">
    </div>

    <div class="dashboard_article_list">
        <?php
        $num = $dashboardArticles->rowCount();

        if ($num > 0) { } else {
            echo '<div class="empty_text">Vous n\'avez aucun Article</div>';
        }
        ?>
        <?php while ($dashboardArticle = $dashboardArticles->fetch()) {
            ?>
            <div class="dashboard_box">
                <div class="dashboard_inset_box">
                    <div class="dasboard_inset1 mr-2">
                        <div class="dashboard_article_title"><?= $dashboardArticle['title'] ?></div>
                        <span class="dashboard_article_date">Le <?= $dashboardArticle['creation_date_fr'] ?></span>
                        <br>
                        <?= '<img class="img-fluid mt-3 mb-1" src="data:image/jpeg;base64,' . $dashboardArticle['image'] . '" width="180" />' ?>
                    </div>
                    <div class="dashboard_inset2 ml-2 mt-3">
                        <div><?= $dashboardArticle['content'] ?></div>
                        <div class="dashboard_btn_box">
                            <a class="btn btn-warning mt-3" href="index.php?action=post&amp;id=<?= $dashboardArticle['id'] . "#postContainer" ?>">Lire</a>
                            <a href="index.php?action=edit&amp;id=<?= $dashboardArticle['id'] . "#editPostContainer" ?>" class="btn btn-info mt-3 ml-2">Editer</a>
                            <a href="" class="btn btn-danger mt-3 ml-2" data-toggle="modal" data-target="#exampleModalCenter<?= $dashboardArticle['id'] ?>">
                                Supprimer
                            </a>
                        </div>

                    </div>
                </div>


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

</div>






<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>