<?php
session_start();
include "resources/html_construct.php";
include "resources/database.php";
// This page is intended to be deleted if copied by others 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>This Project</title>

</head>

<!-- Header / NAVBAR -->
<header>
    <?php display_header(); ?>
</header>

<!--Body-->
<body>
<div class="container">
    <div class="container text-center">
        <h1 class="display-4">Our Project</h1>
        <p class="lead"> 
            This university project was a part of a 2nd year module, exploring database 
            <br>and web application development
        </p>
        <p class="lead">
            Below are some of the key technologies and tools used in the development of this project.
        </p>
    </div>
    
    <!-- Xampp Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center"> XAMPP </h2>
        </div>
        <div class="col-md-6 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h4>Apache</h4>
                    <img src="resources/projectImages/apacheLogo.png" class="img-fluid my-3 card-img" alt="Apache">
                    <p>MySQL is an open source relational database management system (RDBMS) that's used to store and manage data.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h4>MySQL</h4>
                    <img src="resources/projectImages/mySql_Logo.png" class="img-fluid my-3 card-img" alt="MySQL">
                    <p>MySQL is an open source relational database management system (RDBMS) that's used to store and manage data.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tools Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center"> Tools </h2>
        </div>
        <div class="col-md-4 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h4>HTML + CSS</h4>
                    <img src="resources/projectImages/HtmlLogo.png" class="img-fluid my-3 card-img" alt="HTML + CSS">
                    <p>HTML & CSS are the building blocks of the web. HTML provides the structure and CSS provides the styling.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h4> PHP + SQL</h4>
                    <img src="resources/projectImages/phpLogo.png" class="img-fluid my-3 card-img" alt="PHP + SQL">
                    <p>PHP is a server-side scripting language that's used to create dynamic web pages. SQL a query language, used to manage databases.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h4> JavaScript </h4>
                    <img src="resources/projectImages/JS_Logo.png" class="img-fluid my-3 card-img" alt="JavaScript">
                    <p>JavaScript is a programming language that's used to create interactive effects within web browsers. Allowing everything from animations to taking in user inputs</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Technologies Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center"> Technologies </h2>
        </div>
        <div class="col-md-6 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h4>GitHub + Git</h4>
                    <img src="resources/projectImages/GitLogo.png" class="img-fluid my-3 card-img" alt="GitHub + Git">
                    <p>GitHub is a code hosting platform for version control and collaboration. This is where you can find this project hosted!</p>
                    <p>Git is a version control system which allows for users to keep track of changes they have made.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h4> BootStrap CSS</h4>
                    <img src="resources/projectImages/BootstrapLogo.png" class="img-fluid my-3 card-img" alt="BootStrap CSS">
                    <p>Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development.</p>
                    <p>It greatly speeds up development speed, think of it as building blocks you can select from</p>
                </div>
            </div>
        </div>
    </div>
        <div class="container text-center">
        <h1>Interested?</h1>
        <p>This repo is open for copying and modifying as you see fit (GPL-2.0)</p>
        <div class="card bg-light-custom text-black mt-4">
            <div class="card-body">
                <a href="https://github.com/UmaeerH/DIG5127" class="btn btn-outline-custom btn-lg au-slow-hover">View the Repository</a>
            </div>
        </div>
    </div>
</div>



<!---- FOOTER ---->
<footer>
    <?php display_footer(); ?>
</footer>

</body>

<!-- Using internal styling here as it would lead to redundant classes in main.css -->
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .container {
        flex: 1;
    }
    footer {
        position: relative;
        bottom: 0;
        width: 100%;
    }
    .card-img {
        width: 150px;
        height: 150px;
        object-fit: contain;
    }
</style>
</html>