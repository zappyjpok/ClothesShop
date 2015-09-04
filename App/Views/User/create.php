<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 30/08/2015
 * Time: 5:18 PM
 */
?>
<?php require_once('../App/Views/_layouts/_header.php') ?>

    <form action="store" method="post">
        <input type="hidden" name="action" value="CreateUser">
        <label for="FirstName"> First Name: </label>
        <input type="text" name="FirstName"><br>
        <label for="LastName"> Last Name: </label>
        <input type="text" name="LastName"><br>
        <label for="Email"> Email: </label>
        <input type="text" name="Email"><br>
        <label for="Password"> Password: </label>
        <input type="password" name="Password"><br>
        <input type="submit">
    </form>

<?php require_once('../App/Views/_layouts/_footer.php') ?>
