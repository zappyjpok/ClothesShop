<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 29/09/2015
 * Time: 7:25 PM
 */ ?>

<?php require_once('../App/Views/_layouts/_header.php') ?>

    <div class="row">
        <?php if(empty($data['products']) ) { ?>
            <h3> I'm sorry, but you have not ordered any products yet</h3>
        <?php } else { ?>
            <h1> Your order </h1>
            <?php
            foreach(array_chunk($data['products'], 3) as $row) { ?>
                <div class="row">
                    <?php
                    foreach($row as $product) { ?>
                        <section class="medium-4 columns">
                            <div class="product-header">
                                <h4>
                                    <a href="#"> <?php echo $product['name'] ?></a>
                                </h4>
                                <div class="height-200">
                                    <img src="<?php echo Links::action_link(Links::changeToThumbnail($product['image'])) ?>">
                                </div>
                                <p class=""> $<?php echo $product['price'] ?></p>
                                <p class=""> <?php echo Output::phpOutput(Output::shortenString($product['description'], 75)) ?>
                                    <a> Read More</a>
                                </p>
                            </div>
                            <div class="product-form">
                                <form action="<?php echo Links::action_link('home/update/'. $product['id']) ?>" method="post">
                                    <label for="Quantity"> Quantity </label>
                                    <select name="Quantity">
                                        <?php
                                        foreach($data['quantity'] as $value) {
                                            if($product['quantity'] === $value) {
                                                echo "<option value=\"$value\" selected>$value</option>";
                                            } else {
                                                echo "<option value=\"$value\">$value</option>";
                                            }
                                        }
                                        ?>">
                                    </select>
                                    <div class="top-buffer-10">
                                        <input type="submit" class="button info" value="Update">
                                        <button class="button alert">
                                            <a href="<?php echo Links::action_link('home/remove/' . $product['id']) ?>"> Remove</a>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </section>
                    <?php } // end foreach ?>
                </div> <!-- end of row -->
            <?php } // end foreach ?>
            <div class="row">
                <fieldset>
                    <legend> Total</legend>
                    <h3> Total: $<?php echo Output::phpPrice($data['total'])  ?> </h3>
                    <button class="button alert">
                        <a href="<?php echo Links::action_link('home/delete_cart') ?>" >
                            Remove all items
                        </a>
                    </button>
                </fieldset>
            </div>
        <?php } ?>
    </div> <!-- end of row -->

<?php require_once('../App/Views/_layouts/_footer.php') ?>