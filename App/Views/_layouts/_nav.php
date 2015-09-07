<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 5/09/2015
 * Time: 10:22 PM
 */ ?>

<?php  require_once('../App/Library/Paths/Links.php'); ?>

<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="<?php echo Links::action_link('home') ?>">Home </a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">

        <?php

        if($loggedIn === true)
        {
            require_once('../App/Views/_layouts/_navLoggedIn.php');
        }
        else{
            require_once('../App/Views/_layouts/_navNotLoggedIn.php');
        }
        ?>


        <!-- Left Nav Section -->
        <ul class="left">
            <li><a href="#">Shirts</a></li>
            <li><a href="#">Shoes</a></li>
            <li><a href="#">Pants</a></li>
            <li><a href="#">Accessories </a></li>
        </ul>
    </section>

</nav>

