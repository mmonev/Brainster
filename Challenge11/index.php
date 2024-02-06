<?php

echo "Challenge 11 - PHP";

?>

<h1>1.</h1>

<?php

$name = "Kathrin";
$rating = 9;

if ($name == "Kathrin") {
    echo "Hello Kathrin. ";
} else {
    echo "Nice name. ";
}

if ($rating >= 1 && $rating <= 10) {
    echo "Thank you for rating. ";   
} else {
    echo "Invalid rating, only numbers between 1 and 10! ";
}

echo "<br>";
echo "<br>";
echo "<hr>";


?>

<h1>2.</h1>

<?php

$date = date('H:i');
$rated = true;

if ($date < 12) {
    echo "Good morning Kathrin. ";
} elseif ($date < 19) {
    echo "Good afternoon Kathrin. ";
} else {
    echo "Good evening Kathrin. ";
}


if (is_int($rating) && $rating >= 1 && $rating <= 10) {
    if ($rated) {
        echo "You already voted.";
    } else {
        echo "Thanks for voting.";
    }
} else {
    echo "Invalid rating, only numbers between 1 and 10! ";
}

echo "<br>";
echo "<br>";
echo "<hr>";

?>

<h1>3.</h1>

<?php

$voters = array("Martin" => array(true, 2), "Ivan" => array(true, 1), "Vladimir" => array(true, 4), "Sarah" => array(false, 8), "Alex" => array(false, 20), "John" => array(false, 4), "Lukas" => array(true, 3), "Emily" => array(true, 12), "Jo" => array(true, 7), "Marshal" => array(true, 8));

foreach ($voters as $voterName => $voterInfo) {
    $voted = $voterInfo[0];
    $rating = $voterInfo[1];
    $ratingPrint = "1";

    if ($rating <= 10) {
        if ($voted) {
            $ratingPrint = "You already voted with a $rating. <br>";
        } else {
            $ratingPrint = "Thanks for voting with a $rating. <br>";
        }
    } else {
        $ratingPrint = "Invalid rating, only numbers between 1 and 10! <br>";
    }

    $time = date('H:i');

    if ($time < 12) {
        echo "Good morning $voterName. ";
    } elseif ($time < 19) {
        echo "Good afternoon $voterName. ";
    } else {
        echo "Good evening $voterName. ";
    }

    echo "$ratingPrint";
}

?>
