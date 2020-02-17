<?php
$helper = new Pokedex\UrlHelper();
$results = $json['results'] ?? [];
$next = $helper->getOffset($json['next'] ?? null);
$previous = $helper->getOffset($json['previous'] ?? null);
?>

<!--<script>-->
<!--    var pokeatr;-->
<!--    $( document ).ready(function() {-->
<!--        var x = Math.floor((Math.random() * 10) + 1);-->
<!--        $.ajax({url: "https://pokeapi.co/api/v2/pokemon/"+x+"/", success: function(result)-->
<!--            {-->
<!--                pokeatr=JSON.stringify(result);-->
<!--                var pokiename = JSON.stringify(result.forms[0]['name']);-->
<!--                pokiename = pokiename.toString().replace(/"/g, "");-->
<!--                document.getElementById("name").innerHTML =pokiename;-->
<!--                $("#imageset").attr("src", "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/"+x+".png");-->
<!--            }});-->
<!---->
<!--    });-->
<!--</script>-->
<!--<div class="card" style="width: 18rem;">-->
<!--    <img class="card-img-top" id="imageset" >-->
<!--    <div class="card-body">-->
<!--        <p class="card-text" id="name"></p>-->
<!--    </div>-->
<!--</div>-->
<form method="GET">

    <?php if (empty($results)): ?>
        <p>No results found.</p>
    <?php else: ?>

        <p><strong>Search results:</strong></p>

        <p>
            <?php if (!is_null($previous)): ?>
                <button name="previous" value="<?= $previous ?>"><< Previous Pokemons</button>
            <?php endif; ?>

            <?php if (!is_null($next)): ?>
                <button name="next" value="<?= $next ?>">Next Pokemons >></button>
            <?php endif; ?>
        </p>

<!--        --><?php //print_r($results); ?>
        <table class="table" id = "myTable">
            <thead>
            <tr>
                <th scope="col">Pokemon Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($results as $item): ?>
                <tr><td>
                        <?php if(isset($item['name'])): ?>
                            <a href="<?= '?identifier=' . $item['name'] ?>"><?= $item['name'] ?></a>
                        <?php endif; ?>
                    </td></tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    <?php endif; ?>
</form>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>