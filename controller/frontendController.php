<?php

// Loading classes

require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/loginSystemManager.php');
require_once('model/MessageManager.php');


// Login Logout Register Section

// Check and register the submitted values

function home()
{
    $_SESSION['type'] = 1;
    require('view/frontend/homeView.php');
}



function sliderHeader()
{
    require('view/frontend/sliderHeader.php');
}

function meteoBanner()
{
    require('view/frontend/meteoBanner.php');
}

function bannerSection()
{
    require('view/frontend/bannerView.php');
}

function mapSection()
{
    require('view/frontend/mapSection.php');
}

function addPostTest()
{
    require('view/backend/addPostTestView.php');
}

function displayAlertMessage()
{
    if (isset($_SESSION['message'])) {
        require "view/frontend/alertMsgView.php";
    }
}

// Article

function articleSection()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(1);

    require "view/frontend/articlesView.php";
}

function paginationArticles()
{
    $postManager = new PostManager();
    $postManager->pagination(1);
}


function addsSection()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(2);

    require "view/frontend/addView.php";
}


function paginationAdds()
{
    $postManager = new PostManager();
    $postManager->pagination(2);
}



function postArticle($author, $title, $content, $idUser, $file, $type)
{
    $postManager = new PostManager();

    if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['idUser'])) {

        $postManager->postArticle($author, $title, $content, $idUser, $file, $type);

        $_SESSION['message'] = "L'article a été ajouté.";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Remplir tous les champs";
        $_SESSION['msg_type'] = "warning";
    }
}

// Delete article and its comments (using On Delete Cascade)
function deleteArticle($id)
{
    $postManager = new PostManager();
    $postManager->deleteFromDataBase($id);

    $_SESSION['message'] = "L'article a été supprimé.";
    $_SESSION['msg_type'] = "danger";



    header('Location: index.php?action=dashboard#dashboardArticles');
}

// Get the Article by its Id and ready to modify
function editArticle()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    require('view/backend/editPostView.php');
}

// Update the modified article
function updateArticle($id, $author, $title, $content, $idUser, $file, $type)
{
    $postManager = new PostManager();
    $postManager->updatePost($id, $author, $title, $content, $idUser, $file, $type);

    $_SESSION['message'] = "L'article a été mis à jour.";
    $_SESSION['msg_type'] = "info";

    header('Location: index.php?action=dashboard#dashboardArticles');
}

function shortArticle($data)
{
    $textShortened = strip_tags($data['content']);
    if (strlen($textShortened) > 100) {
        $maxLength = 99;
        $textShortened = substr($textShortened, 0, $maxLength);
    }
    echo  $textShortened . '...';
}


function shortenText($textShortened)
{
    $textShortened = strip_tags($textShortened);
    if (strlen($textShortened) > 250) {
        $maxLength = 249;
        $textShortened = substr($textShortened, 0, $maxLength);
    }
    echo  $textShortened . '...';
}


// Signup / Signin Section

// Check submitted values and give access
function login()
{
    $loginSystemManager = new LoginSystemManager();
    $addUser = $loginSystemManager->login();

    $_SESSION['message'] = "Vous etes maintenant connécté.";
    $_SESSION['msg_type'] = "danger";
}

// Deconnect Users / Close Session
function logout()
{
    $loginSystemManager = new LoginSystemManager();
    $logout = $loginSystemManager->logout();
}

function displayModal($text)
{
    if (isset($_SESSION['userId'])) {
        require "view/frontend/logModalView.php";
    } else {
        require "view/frontend/signupModalView.php";
    }
}

// Check and register the submitted values
function addUser()
{
    $loginSystemManager = new LoginSystemManager();
    $addUser = $loginSystemManager->addUser();

    $_SESSION['message'] = "Votre compte à bien été crée.";
    $_SESSION['msg_type'] = "info";
}


function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require "view/frontend/postView.php";
}


// Add Comment to a Post
function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);


    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId . "#navHeader");
        $_SESSION['message'] = "Commentaire ajouté !";
        $_SESSION['msg_type'] = "info";
    }
}


// Check if user and allow to add comment or display the signup modal
function checkUserTypeToComment($post, $text)
{
    if (isset($_SESSION['usertype'])) {
        if ($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 2) {
            // Check if the user has an account to be allowed to add a comment
            require("view/frontend/formCommentView.php");
        } else {
            echo "Se connecter ou créer un compte pour ajouter un commentaire";
        }
    } else {
        require("view/frontend/signupModalView.php");
    }
}



function signal($id, $variable, $commentStatus)
{
    $commentManager = new CommentManager();
    $commentManager->signal($id, $variable, $commentStatus);

    $_SESSION['message'] = "L'article a été signalé.";
    $_SESSION['msg_type'] = "warning";

    header('Location: index.php?action=post&id=' . $_GET['id'] . '#navHeader');
}

function signalComment($comment)
{
    if ($comment['comment_status'] == 0)
        // Increase the variable report Onclick to signal the comment
        {
            echo $comment['report'] + 1;
        } else {
        echo $comment['report'];
    }
}


// Articles

function addPost()
{
    require "view/backend/addPostView.php";
}


// Tableau de bord

function  dashboard()
{

    $postManager = new PostManager(); // Création d'un objet
    $dashboardArticles = $postManager->dashboard();
    require "view/backend/dashboardView.php";
}

function test($data)
{
    require "view/frontend/testView.php";
}

function sendMessage($postId, $senderId, $recipient, $subject, $content)
{
    $messageManager = new MessageManager();
    $message = $messageManager->sendMessage($postId, $senderId, $recipient, $subject, $content);


    $_SESSION['message'] = "Le message à été envoyé";
    $_SESSION['msg_type'] = "danger";

    header('Location: index.php?action=post&id=' . $postId);

    exit;


    //  header('Location: index.php?action=post&id=' . $postId);
}

function getMessage()
{
    $messageManager = new MessageManager();
    $messages = $messageManager->getMessage();

    require "view/backend/messageView.php";
}
