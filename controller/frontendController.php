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
