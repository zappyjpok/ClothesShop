<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 3/09/2015
 * Time: 6:00 PM
 */ ?>

<?php require_once('../App/Views/_layouts/_header.php') ?>

    <form action="check" method="post">
        <label for="Email"> Email: </label>
        <input type="text" name="Email"><br>
        <label for="Password"> Password: </label>
        <input type="password" name="Password"><br>
        <input type="submit">
    </form>

<?php require_once('../App/Views/_layouts/_footer.php') ?>