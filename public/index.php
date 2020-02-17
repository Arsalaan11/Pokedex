<?php require __DIR__ . '/../vendor/autoload.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pokédex</title>
    <!-- Bootsrap UI -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


</head>
<style>
    .card {
        list-style: none;
        padding: 40px;
        background-color: #f4f4f4;
        color: #222;
        text-align: center;
    }
</style>

<body>
<h2>Arsalaan Pokédex</h2>
<?php
$identifier = isset($_GET['identifier']) ? strip_tags($_GET['identifier']) : null;
$offset = 0;

if (isset($_GET['next'])) {
    $offset = (int) $_GET['next'];
    $identifier = null;
} else if (isset($_GET['previous'])) {
    $offset = (int) $_GET['previous'];
    $identifier = null;
}

$client = new Pokedex\Client;
$pokemon = new Pokedex\Pokemon($client);
$identifier = strtolower($identifier);
$json = $pokemon->get($identifier, $offset);

if (isset($json['code'])) {
    require __DIR__ . '/../templates/error.php';
} else if ($offset || empty($identifier)) {
    require __DIR__ . '/../templates/card_of_the_day.php';
    require __DIR__ . '/../templates/list.php';
} else {
    require __DIR__ . '/../templates/single.php';
}
?>
</body>
</html>