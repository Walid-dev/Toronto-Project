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

function addPost()
{
    require('view/backend/addPostView.php');
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

function articleSection()
{
    require "view/frontend/articlesView.php";
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



// Check the usertype and display or not the admin buttons on the header

function checkUserTypeOnHeader()
{
    if (isset($_SESSION['usertype'])) {
        // Check if the user is an Admin to display admin buttons
        if (($_SESSION['usertype'] == 2)) {
            require('view/frontend/adminButtonsView2.php');
        }
    }
}

