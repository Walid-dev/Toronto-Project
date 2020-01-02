<?php

// Loading classes

require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/loginSystemManager.php');
require_once('model/MessageManager.php');


// Login Logout Register Section

// Check and register the submitted values

function setInterval($f, $milliseconds)
{
    $seconds = (int)$milliseconds / 1000;
    while (true) {
        $f();
        sleep($seconds);
    }
}


function getJsVariablesWithCookies()
{
    if (isset($_COOKIE['eventLatitude'])) {
        $eventLatitude = $_COOKIE['eventLatitude'];
        $eventLongitude = $_COOKIE['eventLongitude'];
        $eventPlace = $_COOKIE['eventPlace'];
        $eventDate = $_COOKIE['eventDate'];
        $eventName = $_COOKIE['eventName'];
        $eventTime = $_COOKIE['eventTime'];


        echo $eventPlace . " " . $eventLongitude . " " . $eventLatitude . " " . $eventDate . " " . $eventName . " " . $eventTime;
    }
}


function hello2()
{
    echo "Hello World !!";
}


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
    $loginSystemManager = new LoginSystemManager();


    if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['idUser'])) {

        $file = addslashes($_FILES["image"]["tmp_name"]);
        $loginSystemManager->resize_image($file, "300");

        $file = file_get_contents($file);
        $file = base64_encode($file);
        $fileSize = strlen($file);

        $postManager->postArticle($author, $title, $content, $idUser, $file, $type);


        $_SESSION['message'] = "L'article a été ajouté.";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Remplir tous les champs";
        $_SESSION['msg_type'] = "warning";
    }
}

function postEventBis($userUid, $eventName, $eventPlace, $eventLat, $eventLon, $eventDate, $eventTime)
{
    $postManager = new PostManager();
    if (!empty($_POST['eventName']) && !empty($_POST['eventPlace']) && !empty($_POST['eventLat']) && !empty($_POST['eventLon']) && !empty($_POST['eventDate']) && !empty($_POST['eventTime'])) {
        $postManager->postEvent($userUid, $eventName, $eventPlace, $eventLat, $eventLon, $eventDate, $eventTime);

        $_SESSION['message'] = "L'évenement a été ajouté.";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Remplir tous les champs";
        $_SESSION['msg_type'] = "warning";
    }
}

function postEvent($userUid, $eventName, $eventPlace, $eventLat, $eventLon, $eventDate, $eventTime)
{
    $postManager = new PostManager();

    $postManager->postEvent($userUid, $eventName, $eventPlace, $eventLat, $eventLon, $eventDate, $eventTime);

    $_SESSION['message'] = "L'évenement a été ajouté.";
    $_SESSION['msg_type'] = "success";
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

    if (isset($_SESSION['dashboardUserCheck']) == $_SESSION['userId']) {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $postManager->getPost($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }

        require('view/backend/editPostView.php');
    } else {
        throw new Exception('Cette page ne vous ais pas autorisée.');
    }
}

// Update the modified article
function updateArticle($id, $author, $title, $content, $idUser, $file, $type)
{
    $postManager = new PostManager();
    $loginSystemManager = new LoginSystemManager();

    $resizeImg = $loginSystemManager->resize_image($file, "300");

    $postManager->updatePost($id, $author, $title, $content, $idUser, $file, $type);

    $_SESSION['message'] = "L'article a été mis à jour.";
    $_SESSION['msg_type'] = "danger";

    header('Location: index.php?action=dashboard#dashboardArticles');
}

function updateArticleWithoutImg($id, $author, $title, $content, $idUser, $type)
{
    $postManager = new PostManager();
    $loginSystemManager = new LoginSystemManager();

    $postManager->updatePostWithoutImg($id, $author, $title, $content, $idUser, $type);

    $_SESSION['message'] = "L'article a été mis à jour.";
    $_SESSION['msg_type'] = "danger";

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


function shortenContent($textShortened, $maxLenght)
{
    $textShortened = strip_tags($textShortened);
    if (strlen($textShortened) > $maxLenght) {
        $textShortened = substr($textShortened, 0, $maxLenght);
        echo  $textShortened . '...';
    } else {
        echo $textShortened;
    }
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
        require "view/frontend/logModalView2.php";
    } else {
        require "view/frontend/signupModalView.php";
    }
}

function displayModal2($text)
{
    if (isset($_SESSION['userId'])) {
        require "view/frontend/logModalView.php";
    } else { }
}

// Check and register the submitted values
function addUser()
{
    $loginSystemManager = new LoginSystemManager();
    $addUser = $loginSystemManager->addUser();

    $_SESSION['message'] = "Votre compte à bien été crée.";
    $_SESSION['msg_type'] = "danger";
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
        $_SESSION['msg_type'] = "danger";
    }
}

function addPpImage($idUser)
{
    $loginSystemManager = new LoginSystemManager();
    $loginSystemManager->addPpImage($idUser);
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
        require("view/frontend/signupModalPostView.php");
    }
}

function resize_image($file, $max_resolution)
{
    $loginSystemManager = new LoginSystemManager();
    $loginSystemManager->resize_image($file, $max_resolution);
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

function getPpImg($idUser)
{
    $postManager = new PostManager();
    $getPpImg = $postManager->getPpImg($idUser);
    require "view/backend/dashboardHeaderView.php";
}



function sendMessage($postId, $senderId, $recipient, $subject, $content)
{
    $messageManager = new MessageManager();

    if (!empty($_POST['postId']) && !empty($_POST['senderId']) && !empty($_POST['senderId']) && !empty($_POST['subject']) && !empty($_POST['content'])) {

        $message = $messageManager->sendMessage($postId, $senderId, $recipient, $subject, $content);
        $_SESSION['message'] = "Le message à été envoyé";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Tous les champs ne sont pas remplis.";
        $_SESSION['msg_type'] = "danger";
    }



    header('Location: index.php?action=getMessage');




    //  header('Location: index.php?action=post&id=' . $postId);
}

function getMessage()
{
    $messageManager = new MessageManager();
    $messages = $messageManager->getMessage();

    require "view/backend/messageView.php";
}
