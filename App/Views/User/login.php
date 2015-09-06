<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 3/09/2015
 * Time: 6:00 PM
 */ ?>

<?php require_once('../App/Views/_layouts/_header.php') ?>

    <div class="row">
        <div class="large-12">
            <fieldset>
                <legend>Login</legend>
                <form action="check" method="post">
                    <div class="row">
                        <div class="medium-6 columns">
                            <label for="Email"> Email: </label>
                            <input type="text" name="Email">
                        </div>
                        <div class="medium-6 columns">
                            <label for="Password"> Password: </label>
                            <input type="password" name="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-6 columns">
                            <input type="submit" class="button" value="Login">
                        </div>
                    </div>

                </form>
            </fieldset>
        </div>
    </div>

<?php require_once('../App/Views/_layouts/_footer.php') ?>