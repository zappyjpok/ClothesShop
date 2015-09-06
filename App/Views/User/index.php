<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 30/08/2015
 * Time: 3:13 PM
 */ ?>

<?php require_once('../App/Views/_layouts/_header.php') ?>

    <pre>
       <?php print_r(User::All()); ?>
    </pre>

    <h1> Next </h1>

    <pre>
       <?php print_r(User::login_info('Tom@gmail.com')); ?>
    </pre>

<?php require_once('../App/Views/_layouts/_footer.php') ?>