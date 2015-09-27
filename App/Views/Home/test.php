<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 27/09/2015
 * Time: 3:52 PM
 */ ?>

<?php require_once('../App/Views/_layouts/_header.php') ?>

    <h1> Cart data </h1>
        <pre>
            <?php
                print_r($data['cart'])
            ?>
        </pre>

    <h1> User  </h1>
        <pre>
            <?php
            print_r($data['user']);
            ?>
        </pre>


<?php require_once('../App/Views/_layouts/_footer.php') ?>