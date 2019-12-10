<?php ob_start(); ?>
<div class="backend_view">
    <div class="img_title-box text-center">
        <img class="mt-5 mb-3" src="public/images/dashboard.png" width="180" alt="">
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
                <?= '<img class="dashboard_article_img mr-4" src="data:image/jpeg;base64,' . $dashboardArticle['image'] . '" />' ?>
                <span class="dashboard_article_title ml-3"><?= strip_tags($dashboardArticle['title']) ?></span>
                <span class="dashboard_article_date ml-3">Le <?= $dashboardArticle['creation_date_fr'] ?></span>
                <div class="dashboard_btn_box ml-3">
                    <a class="btn btn-warning" href="index.php?action=post&amp;id=<?= $dashboardArticle['id'] . "#postContainer" ?>">Lire</a>
                    <a href="index.php?action=edit&amp;id=<?= $dashboardArticle['id'] . "#editPostContainer" ?>" class="btn btn-info ml-2">Editer</a>
                    <a href="" class="btn btn-danger ml-2" data-toggle="modal" data-target="#exampleModalCenter<?= strip_tags($dashboardArticle['id']) ?>">
                        Supprimer
                    </a>
                </div>



                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter<?= $dashboardArticle['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div id="modalDelete" class="modal-content deleteModalContent">
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
                                <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
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


<div class="container">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>