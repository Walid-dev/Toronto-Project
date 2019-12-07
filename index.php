<?php
session_start();
require('controller/frontendController.php');

try {
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            throw new Exception('Tous les champs ne sont pas remplis.');
        } elseif ($_GET['error'] == "invaliduidmail") {
            throw new Exception('Email ou pseudo invalide.');
        } elseif ($_GET['error'] == "invaliduid") {
            throw new Exception('Email ou pseudo invalide.');
        } elseif ($_GET['error'] == "invalidmail") {
            throw new Exception('Email invalide.');
        } elseif ($_GET['error'] == "passwordcheck") {
            throw new Exception('Les mots de passe ne se correspondent pas.');
        } elseif ($_GET['error'] == "usertaken") {
            throw new Exception('Pseudo déja pris.');
        } elseif ($_GET['error'] == "emailtaken") {
            throw new Exception('Email déja pris.');
        } elseif ($_GET['error'] == "wrongpwd") {
            throw new Exception('Mot de passe incorrect');
        }
    } elseif (isset($_GET['login'])) {
        home();
    } elseif (isset($_GET['disconnected'])) {
        throw new Exception(' Vous etes maintenant déconnécté.');
    } elseif (isset($_POST['login-submit'])) {
        login();
    } elseif (isset($_POST['signup-submit'])) {
        addUser();
    } elseif (isset($_POST['logout-submit'])) {
        logout();
    } elseif (isset($_POST['signal'])) {
        signal(strip_tags($_POST['commentId']), strip_tags($_POST['report']), strip_tags($_POST['commentStatus']));
    } elseif (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], strip_tags($_POST['author']), strip_tags($_POST['comment']));
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis.');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif (isset($_SESSION['userId'])) {
            if ($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 2) {
                if ($_GET['action'] == 'addPost') {
                    addPost();
                } elseif ($_GET['action'] == 'dashboard') {
                    dashboard();
                } elseif ($_GET['action'] == 'sendMsg') {
                    if (!empty($_POST['postId']) && !empty($_POST['senderId']) && !empty($_POST['senderId']) && !empty($_POST['subject']) && !empty($_POST['content'])) {
                        sendMessage(strip_tags($_POST['postId']), strip_tags($_POST['senderId']), strip_tags($_POST['recipient']), strip_tags($_POST['subject']), strip_tags($_POST['content']));
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis.');
                    }
                } else { }
                if (isset($_POST['save'])) {
                    $file = addslashes($_FILES["image"]["tmp_name"]);
                    $file = file_get_contents($file);
                    $file = base64_encode($file);
                    postArticle(strip_tags($_POST['author']), strip_tags($_POST['title']), strip_tags($_POST['content']), strip_tags($_POST['idUser']), strip_tags($file), strip_tags($_POST['type']));
                } elseif ($_GET['action'] == 'delete') {
                    deleteArticle($_GET['id']);
                } elseif ($_GET['action'] == 'getMessage') {
                    getMessage();
                } elseif ($_GET['action'] == 'edit') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        editArticle();
                    } else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif (isset($_POST['update'])) {
                    $file = addslashes($_FILES["image"]["tmp_name"]);
                    $file = file_get_contents($file);
                    $file = base64_encode($file);
                    updateArticle($_GET['id'], strip_tags($_POST['author']), strip_tags($_POST['title']), strip_tags($_POST['content']), strip_tags($_POST['idUser']), $file, strip_tags($_POST['type']));
                } elseif ($_GET['action'] == 'listComments') {
                    listComments();
                } elseif ($_GET['action'] == 'deleteComment') {
                    deleteComment($_GET['id']);
                } elseif ($_GET['action'] == 'validateComment') {
                    validateComment($_GET['id']);
                }
            } else {
                throw new Exception('Page reservée aux administrateurs');
            }
        } else {
            throw new Exception('Page reservée aux administrateurs');
        }
    } else {
        home();
    }
} catch (Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['msg_type'] = "danger";
    home();
}
