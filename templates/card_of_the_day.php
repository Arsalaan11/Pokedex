<?php

if(isset($_COOKIE['ArsalaanPokeDex'])) {
    $pokemon_number = $_COOKIE['ArsalaanPokeDex'];
}
else {

    $results = $json['results'] ?? [];
    $number_of_pokemon = count($results);

    // Generate Pokemon Number
    $array_lookup_index = rand(0,$number_of_pokemon - 1);
    $pokemon_number = (int) explode('/', $results[$array_lookup_index]['url'])[6];

    $cookie_name = 'ArsalaanPokeDex';
    $cookie_value = $pokemon_number;
    setcookie($cookie_name, $cookie_value, time() + 86400);
}

$item = $pokemon->get($pokemon_number);
?>
<!-- Card Layout -->
<div class="card" style="width: 18rem;">
    <a href="<?= '?identifier=' . $item['name'] ?>">
        <img class="card-img-top" id="imageset" >
        <div class="card-body">
            <p class="card-text" id="name">Click here to find your Card of the Day!</p>
        </div>
    </a>
</div>