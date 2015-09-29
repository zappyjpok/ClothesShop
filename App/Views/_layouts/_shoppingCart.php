<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 9/09/2015
 * Time: 9:43 PM
 */ ?>

<div class="row">
    <div class="medium-12 columns jumbo">
        <a href="<?php echo Links::action_link('home/cart') ?>" class="button info">
            <img src="<?php echo Links::action_link('images/shopping_cart.png') ?>"/>
            <?php echo $cart ?>
        </a>
    </div>
</div>