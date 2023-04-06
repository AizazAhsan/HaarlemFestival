<?php
require_once __DIR__ . '/../../model/order.php';

include __DIR__ . '/../header.php'; ?>


<div class="row">
    <div class="col mx-auto" style="background-color: #9EBAD9">
        <h1 class="text-center text-black m-3 mb-5">Order summary</h1>


        <div class="row m-5">

            <?php
            if (isset($_SESSION['order'])) {
                foreach ($_SESSION['order']->events as $key => $event) {
                    ?>

                    <div class="col-1 mb-3">
                        <img src="../images/order-dance-event.svg" alt="music" style="width: 50px; height: 50px">
                    </div>

                    <div class="col-6">
                        <h3><?php
                            if($event instanceof dance)
                                echo $event->artist_name . " @ " . $event->venue_name;
                            else if ($event instanceof accessPass)
                                echo $event->displayPass($event->id);
                            ?></h3>
                    </div>

                    <div class="col-1">
                        <div class="row">
                            <div class="col-md-4">
                            <button class="btn btn-primary">-</button>
                            </div>
                            <div class="col-md-4">

                            <h3 id="quantity" class="ms-2">1</h3>
                            </div>
                            <div class="col-md-4">

                            <button class="btn btn-primary">+</button>
                                </div>
                        </div>
                    </div>

                    <div class="col-3 text-center">
                        <h3><?php echo "€" . $event->price ?></h3>
                    </div>

                    <div class="col-1">
                        <form action="/shoppingCart/remove" method="post">
                            <input hidden type="text" name="remove_item_key" value="<?php echo $key; ?>">
                            <button type="submit" class="btn btn-danger" style="width: 6em">X</button>
                        </form>
                    </div>
                    <?php
                }
                }
            else
                echo "No events added yet"; ?>
        </div>


        <div class="row m-3 text-center">
            <div class="col">
                <h1>Total</h1>
            </div>
            <div class="col">
                <h1><?php if (isset($_SESSION['order']))
                        echo "€" . $_SESSION['order']->total_price;
                    else
                        echo "€0" ?></h1>

            </div>
        </div>

        <form action="/shoppingCart/submit" method="post">
            <div class="row m-3">
                <button class="btn btn-primary fs-3" name="submitOrder">Continue to secure payment</button>
            </div>
        </form>
    </div>
</div>

<script>

</script>
<?php
include __DIR__ . '/../footer.php'; ?>
