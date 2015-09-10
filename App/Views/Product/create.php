<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 9/09/2015
 * Time: 5:01 PM
 */ ?>

<?php require_once('../App/Views/_layouts/_header.php') ?>
    <div class="row">
        <div class="large-12">
            <fieldset>
                <legend>New Product</legend>
                <form action="store" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="medium-6 columns">
                            <label for="FirstName"> Name: </label>
                            <input type="text" name="Name">
                        </div>
                        <div class="medium-6 columns">
                            <label for="LastName"> Price: </label>
                            <input type="text" name="Price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            <label for="Description"> Description: </label>
                            <textarea name="Description" cols="50" rows="5"> </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            <label for="Image"> Image: </label>
                            <input type="file" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-6 columns">
                            <input type="submit" class="button">
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>

<?php require_once('../App/Views/_layouts/_footer.php') ?>