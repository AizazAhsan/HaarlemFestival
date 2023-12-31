<?php include __DIR__ . '/../header.php'; ?>

<head>
    <link href="../../public/css/style_food.css" rel="stylesheet">
    <title> <?= $restaurant->name ?></title>
</head>
<body style="background-color: #49111C; color:white;">
<a href="/yummy">
    <button style=" background-color: #49111C; color:white; border: 1px solid white; border-radius: 10px; margin-bottom: 10px; padding: 10px;">
        Back to Restaurants
    </button>
</a>


<?php $photos = explode(',', $restaurant->photo); ?>
<div class="row">
    <div class="col-md-8 justify-content-end">
<h1><?= $restaurant->name ?></h1>
</div>

<div id="restaurant-container">
    <div class="row" id="restaurantDescription">
        <div class="col-md-7" id="restaurantDescription" style="   border: 1px solid white;
    border-radius: 10px;
    margin-bottom: 10px;
padding: 1em;">
            <h4><?= $restaurant->description ?></h4>
        </div>
        <div class="col-md-3" id="restaurantMainPhoto">
            <img src="<?= $photos[0] ?>" alt="<?= $restaurant->name ?>" width="400" height="300" style="padding: 1em">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" style="padding: 1em;">
            <img src="<?= $photos[1] ?>" alt="<?= $restaurant->name ?>" width="280" height="190">
        </div>
        <div class="col-md-4" style="padding: 1em;">
            <img src="<?= $photos[2] ?>" alt="<?= $restaurant->name ?>" width="280" height="190">
        </div>
        <div class="col-md-4" style="padding: 1em;">
            <img src="<?= $photos[3] ?>" alt="<?= $restaurant->name ?>" width="280" height="190">
        </div>
    </div>
    <div class="row" style="padding: 1em;">
            <div class="col-md-2" style="border: 1px solid white; border-radius: 10px;  margin-bottom: 10px; padding: 1em;">
                <h4>Session Times</h4>
                <ul>
                    <?php
                    $firstSessionDate = $restaurant->sessions[0]->date;
                    foreach ($restaurant->sessions as $session):
                        if ($firstSessionDate == $session->date) {
                            $start_time = new DateTime($session->startTime);
                            $end_time = new DateTime($session->endTime);
                            ?>
                            <li><?= $start_time->format('H:i') ?> - <?= $end_time->format('H:i') ?></li>
                        <?php } //this is the end of the if statement showing only the sessions with the same date as the first one
                        //this is because it's only relevant the times not the dates and showing them all is a repetition
                        else { continue; }
                    endforeach; ?>
                </ul>
            </div>
            <div class="col-md-2" style="   border: 1px solid white;
    border-radius: 10px;
    margin-bottom: 10px;
    padding: 1em;">
                <h4>Prices</h4>
                <p>Adult: <?= $session->sessionPrice ?> €</p>
                <p>Under 12:  <?= $session->reducedPrice ?> €</p>
            </div>

        <div class="col-md-3" style="   border: 1px solid white;
    border-radius: 10px;
    margin-bottom: 10px;
    padding: 10px;">
            <h4>Location</h4>
            <p><?= $restaurant->address ?></p>
        </div>
        <div class="col-md-3" style="   border: 1px solid white;
    border-radius: 10px;
    margin-bottom: 10px;
    padding: 10px;">
            <h5>Dietary</h5>
            <p><?= $restaurant->dietary ?></p>
            <h5>Cuisines</h5>
            <p><?= $restaurant->cuisines ?></p>
        </div>
    </div>
</div>

    <hr>

<div class="container" id="reservationForm" style="background-color: #8D6A71; border-radius: 5px; color: #000000">
    <form method="post" action="/add/reservation">
        <div class="form-group" style="padding-top: 1em">
            <label for="restaurantName"><h4>You are currently placing a reservation for:</h4></label>
            <input class="form-control" id="restaurantName" name="restaurantName" value="<?= $restaurant->name ?>" readonly>
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="adults">Number of adults:</label>
            <input type="number" id="adults" name="adults" min="1" max="<?=$session->spaces?>" required placeholder="Number of Adults" ><br>
        </div>
        <div class="form-group">
            <label for="under12">Number of children under 12:</label>
            <input type="number" id="under12" name="under12" min="0" max="<?=$session->spaces - 1?>" value="0" placeholder="Number of children under 12">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
        <div class="form-group">
            <label for="sessionId">Session: </label>
            <select id="sessionId" name="sessionId" required>
                <?php foreach ($restaurant->sessions as $session) {
                    $value = $session->id;
                    $date = new DateTime($session->date);
                    $start_time = new DateTime($session->startTime);
                    $end_time = new DateTime($session->endTime);
                    if ($session->spaces == 0) {
                        $label = $date->format('D, j F, o') . ' from ' . $start_time->format('H:i') . ' until ' . $end_time->format('H:i') . " / spaces remaining: " . $session->spaces . " - SOLD OUT";
                        //disable button if selected
                        $disabled = 'disabled';
                    }    else
                    $label = $date->format('D, j F, o') . ' from ' . $start_time->format('H:i') . ' until ' . $end_time->format('H:i') . " / spaces remaining: " . $session->spaces;
                    ?>
                    <option value="<?=$value?>"><?php echo $value, " - ", $label ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Extra requests:</label>
            <textarea id="comment" name="comment" rows="4" cols="40"></textarea><br>
        </div>

        <button type="submit" name="addReservation" class="btn btn-primary" <?=$disabled?>>Submit</button>
    </form>
    <br>
</div>

</div>
</body>


<?php include __DIR__ . '/../footer.php'; ?>