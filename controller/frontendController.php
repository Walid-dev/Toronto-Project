<?php

// Loading classes

require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/loginSystemManager.php');

// Login Logout Register Section

// Check and register the submitted values

function home()
{
    require('view/frontend/homeView.php');
}


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts();
    // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function sliderHeader()
{
    require('view/frontend/sliderHeader.php');
}

function meteoBanner()
{
    require('view/frontend/meteoBanner.php');
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
    $posts = $postManager->getPosts();


    require "view/frontend/articlesView.php";
}

function pagination()
{
    $postManager = new PostManager();
    $postManager->pagination();
}

function postArticle($author, $title, $content, $idUser, $file)
{
    $postManager = new PostManager();
    if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['idUser'])) {
        $postManager->postArticle($author, $title, $content, $idUser, $file);

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

    header('Location: index.php#sectionArticles');
}

// Get the Article by its Id and ready to modify
function editArticle()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    require('view/frontend/editPostView.php');
}

// Update the modified article
function updateArticle($id, $author, $title, $content)
{
    $postManager = new PostManager();
    $postManager->updatePost($id, $author, $title, $content);

    $_SESSION['message'] = "L'article a été mis à jour.";
    $_SESSION['msg_type'] = "info";

    header('Location: index.php#sectionArticles');
}

function shortArticle($data)
{
    $textShortened = $data['content'];
    if (strlen($textShortened) > 250) {
        $maxLength = 249;
        $textShortened = substr($textShortened, 0, $maxLength);
    }
    echo  $textShortened . '...';
}


// Signup / Signin Section

function displayModal()
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

// Check submitted values and give access
function login()
{
    $loginSystemManager = new LoginSystemManager();
    $addUser = $loginSystemManager->login();
}

// Deconnect Users / Close Session
function logout()
{
    $loginSystemManager = new LoginSystemManager();
    $logout = $loginSystemManager->logout();
}



// Articles

function addPost()
{
    require "view/frontend/addPostView.php";
}


function addImage()
{




    require "view/backend/addImageView.php";
}
