<?php




$genre = array(

    $musicals = array(
        "----> 0 " => "Oklahoma",
        "----> 1 " => "The Music Man",
        "----> 2 " => "South Pacific",
    ),
    $dramas = array(
        "----> 0" => "Lawrence of Arabia",
        "----> 2" => "To Kill a Mockingbird",
        "----> 3" => "Casablanca",
    ),

    $MYSTERIES = array(
        "----> 0" => "The Maltese Falcon",
        "----> 2" => "Rear Window",
        "----> 3" => "North by Northwest",
    ),
);


$j = 0;

while ($j <= 2) {

    foreach ($genre[$j] as $key => $value) {

        echo "$key = $value";
        echo "<br>";
    }

    $j++;

    echo "<br>";
}



?>